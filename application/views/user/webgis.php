
<html>
    <head>
	    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
		<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
		
		<!-- <link rel="stylesheet" href="../css/styledLayerControl.css" />
		<script src="../src/styledLayerControl.js"></script> -->
		
		<script src="http://maps.google.com/maps/api/js?v=3.2&sensor=false&key=AIzaSyDeqZIQXFKMXqYccaxFFHtsxlhafvRFeQ4"></script>
        <script src="https://raruto.github.io/cdn/leaflet-google/0.0.3/leaflet-google.js"></script>
		
		<!-- <script src="plugins/Bing.js"></script> -->
        <script>
        L.Control.StyledLayerControl = L.Control.Layers.extend({
    options: {
        collapsed: true,
        position: 'topright',
        autoZIndex: true
    },

    initialize: function(baseLayers, groupedOverlays, options) {
        var i,
            j;
        L.Util.setOptions(this, options);

        this._layers = {};
        this._lastZIndex = 0;
        this._handlingClick = false;
        this._groupList = [];
        this._domGroups = [];

        for (i in baseLayers) {
            for (var j in baseLayers[i].layers) {
                this._addLayer(baseLayers[i].layers[j], j, baseLayers[i], false);
            }
        }

        for (i in groupedOverlays) {
            for (var j in groupedOverlays[i].layers) {
                this._addLayer(groupedOverlays[i].layers[j], j, groupedOverlays[i], true);
            }
        }


    },

    onAdd: function(map) {
        this._initLayout();
        this._update();

        map
            .on('layeradd', this._onLayerChange, this)
            .on('layerremove', this._onLayerChange, this);

        return this._container;
    },

    onRemove: function(map) {
        map
            .off('layeradd', this._onLayerChange)
            .off('layerremove', this._onLayerChange);
    },

    addBaseLayer: function(layer, name, group) {
        this._addLayer(layer, name, group, false);
        this._update();
        return this;
    },

    addOverlay: function(layer, name, group) {
        this._addLayer(layer, name, group, true);
        this._update();
        return this;
    },

    removeLayer: function(layer) {
        var id = L.Util.stamp(layer);
        delete this._layers[id];
        this._update();
        return this;
    },

    removeGroup: function(group_Name) {
        for (group in this._groupList) {
            if (this._groupList[group].groupName == group_Name) {
                for (layer in this._layers) {
                    if (this._layers[layer].group && this._layers[layer].group.name == group_Name) {
                        delete this._layers[layer];
                    }
                }
                delete this._groupList[group];
                this._update();
                break;
            }
        }
    },

    selectLayer: function(layer) {
        this._map.addLayer(layer);
        this._update();
    },

    unSelectLayer: function(layer) {
        this._map.removeLayer(layer);
        this._update();
    },

    selectGroup: function(group_Name){
    	this.changeGroup( group_Name, true)
    },

    unSelectGroup: function(group_Name){
    	this.changeGroup( group_Name, false)
    },

    changeGroup: function(group_Name, select){ 
    	for (group in this._groupList) {
            if (this._groupList[group].groupName == group_Name) {
                for (layer in this._layers) {
                    if (this._layers[layer].group && this._layers[layer].group.name == group_Name) {
                        if( select ) {
                        	this._map.addLayer(this._layers[layer].layer);
                        } else {
                        	this._map.removeLayer(this._layers[layer].layer);
                        }
                    }
                }
                break;
            }
        }
        this._update();
    },


    _initLayout: function() {
        var className = 'leaflet-control-layers',
            container = this._container = L.DomUtil.create('div', className);

        //Makes this work on IE10 Touch devices by stopping it from firing a mouseout event when the touch is released
        container.setAttribute('aria-haspopup', true);

        if (!L.Browser.touch) {
            L.DomEvent.disableClickPropagation(container);
            L.DomEvent.on(container, 'wheel', L.DomEvent.stopPropagation);
        } else {
            L.DomEvent.on(container, 'click', L.DomEvent.stopPropagation);
        }

        var section = document.createElement('section');
        section.className = 'ac-container ' + className + '-list';

        var form = this._form = L.DomUtil.create('form');

        section.appendChild(form);

        if (this.options.collapsed) {
            if (!L.Browser.android) {
                L.DomEvent
                    .on(container, 'mouseover', this._expand, this)
                    .on(container, 'mouseout', this._collapse, this);
            }
            var link = this._layersLink = L.DomUtil.create('a', className + '-toggle', container);
            link.href = '#';
            link.title = 'Layers';

            if (L.Browser.touch) {
                L.DomEvent
                    .on(link, 'click', L.DomEvent.stop)
                    .on(link, 'click', this._expand, this);
            } else {
                L.DomEvent.on(link, 'focus', this._expand, this);
            }

            this._map.on('click', this._collapse, this);
            // TODO keyboard accessibility

        } else {
            this._expand();
        }

        this._baseLayersList = L.DomUtil.create('div', className + '-base', form);
        this._overlaysList = L.DomUtil.create('div', className + '-overlays', form);

        container.appendChild(section);

        // process options of ac-container css class - to options.container_width and options.container_maxHeight
        for (var c = 0; c < (containers = container.getElementsByClassName('ac-container')).length; c++) {
            if (this.options.container_width) {
                containers[c].style.width = this.options.container_width;
            }

            // set the max-height of control to y value of map object
            this._default_maxHeight = this.options.container_maxHeight ? this.options.container_maxHeight : (this._map._size.y - 70);
            containers[c].style.maxHeight = this._default_maxHeight + "px";

        }

        window.onresize = this._on_resize_window.bind(this);

    },

    _on_resize_window: function() {
        // listen to resize of screen to reajust de maxHeight of container
        for (var c = 0; c < containers.length; c++) {
            // input the new value to height
            containers[c].style.maxHeight = (window.innerHeight - 90) < this._removePxToInt(this._default_maxHeight) ? (window.innerHeight - 90) + "px" : this._removePxToInt(this._default_maxHeight) + "px";
        }
    },

    // remove the px from a css value and convert to a int
    _removePxToInt: function(value) {
        if (typeof value === 'string') {
            return parseInt(value.replace("px", ""));
        }
        return value;
    },

    _addLayer: function(layer, name, group, overlay) {
        var id = L.Util.stamp(layer);

        this._layers[id] = {
            layer: layer,
            name: name,
            overlay: overlay
        };

        if (group) {
            var groupId = this._groupList.indexOf(group);

            // if not find the group search for the name
            if (groupId === -1) {
                for (g in this._groupList) {
                    if (this._groupList[g].groupName == group.groupName) {
                        groupId = g;
                        break;
                    }
                }
            }

            if (groupId === -1) {
                groupId = this._groupList.push(group) - 1;
            }

            this._layers[id].group = {
                name: group.groupName,
                id: groupId,
                expanded: group.expanded
            };
        }

        if (this.options.autoZIndex && layer.setZIndex) {
            this._lastZIndex++;
            layer.setZIndex(this._lastZIndex);
        }
    },

    _update: function() {
        if (!this._container) {
            return;
        }

        this._baseLayersList.innerHTML = '';
        this._overlaysList.innerHTML = '';
        this._domGroups.length = 0;

        var baseLayersPresent = false,
            overlaysPresent = false,
            i,
            obj;

        for (i in this._layers) {
            obj = this._layers[i];
            this._addItem(obj);
            overlaysPresent = overlaysPresent || obj.overlay;
            baseLayersPresent = baseLayersPresent || !obj.overlay;
        }

    },

    _onLayerChange: function(e) {
        var obj = this._layers[L.Util.stamp(e.layer)];

        if (!obj) {
            return;
        }

        if (!this._handlingClick) {
            this._update();
        }

        var type = obj.overlay ?
            (e.type === 'layeradd' ? 'overlayadd' : 'overlayremove') :
            (e.type === 'layeradd' ? 'baselayerchange' : null);

        if (type) {
            this._map.fire(type, obj);
        }
    },

    // IE7 bugs out if you create a radio dynamically, so you have to do it this hacky way (see http://bit.ly/PqYLBe)
    _createRadioElement: function(name, checked) {

        var radioHtml = '<input type="radio" class="leaflet-control-layers-selector" name="' + name + '"';
        if (checked) {
            radioHtml += ' checked="checked"';
        }
        radioHtml += '/>';

        var radioFragment = document.createElement('div');
        radioFragment.innerHTML = radioHtml;

        return radioFragment.firstChild;
    },

    _addItem: function(obj) {
        var label = document.createElement('div'),
            input,
            checked = this._map.hasLayer(obj.layer),
            container;


        if (obj.overlay) {
            input = document.createElement('input');
            input.type = 'checkbox';
            input.className = 'leaflet-control-layers-selector';
            input.defaultChecked = checked;

            label.className = "menu-item-checkbox";

        } else {
            input = this._createRadioElement('leaflet-base-layers', checked);

            label.className = "menu-item-radio";
        }


        input.layerId = L.Util.stamp(obj.layer);

        L.DomEvent.on(input, 'click', this._onInputClick, this);

        var name = document.createElement('span');
        name.innerHTML = ' ' + obj.name;

        label.appendChild(input);
        label.appendChild(name);

        if (obj.layer.StyledLayerControl) {

            // configure the delete button for layers with attribute removable = true
            if (obj.layer.StyledLayerControl.removable) {
                var bt_delete = document.createElement("input");
                bt_delete.type = "button";
                bt_delete.className = "bt_delete";
                L.DomEvent.on(bt_delete, 'click', this._onDeleteClick, this);
                label.appendChild(bt_delete);
            }

            // configure the visible attribute to layer
			if( obj.layer.StyledLayerControl.visible ){
				this._map.addLayer(obj.layer);
			}	

        }


        if (obj.overlay) {
            container = this._overlaysList;
        } else {
            container = this._baseLayersList;
        }

        var groupContainer = this._domGroups[obj.group.id];

        if (!groupContainer) {

            groupContainer = document.createElement('div');
            groupContainer.id = 'leaflet-control-accordion-layers-' + obj.group.id;

            // verify if group is expanded
            var s_expanded = obj.group.expanded ? ' checked = "true" ' : '';

            // verify if type is exclusive
            var s_type_exclusive = this.options.exclusive ? ' type="radio" ' : ' type="checkbox" ';

            inputElement = '<input id="ac' + obj.group.id + '" name="accordion-1" class="menu" ' + s_expanded + s_type_exclusive + '/>';
            inputLabel = '<label for="ac' + obj.group.id + '">' + obj.group.name + '</label>';

            article = document.createElement('article');
            article.className = 'ac-large';
            article.appendChild(label);

            // process options of ac-large css class - to options.group_maxHeight property
            if (this.options.group_maxHeight) {
                article.style.maxHeight = this.options.group_maxHeight;
            }

            groupContainer.innerHTML = inputElement + inputLabel;
            groupContainer.appendChild(article);
            container.appendChild(groupContainer);

            this._domGroups[obj.group.id] = groupContainer;
        } else {
            groupContainer.lastElementChild.appendChild(label);
        }

        return label;
    },

    _onInputClick: function() {
        var i,
            input,
            obj,
            inputs = this._form.getElementsByTagName('input'),
            inputsLen = inputs.length;

        this._handlingClick = true;

        for (i = 0; i < inputsLen; i++) {
            input = inputs[i];
            obj = this._layers[input.layerId];

            if (!obj) {
                continue;
            }

            if (input.checked && !this._map.hasLayer(obj.layer)) {
                this._map.addLayer(obj.layer);

            } else if (!input.checked && this._map.hasLayer(obj.layer)) {
                this._map.removeLayer(obj.layer);
            }
        }

        this._handlingClick = false;
    },

    _onDeleteClick: function(obj) {
        var node = obj.target.parentElement.childNodes[0];
        n_obj = this._layers[node.layerId];

        // verify if obj is a basemap and checked to not remove
        if (!n_obj.overlay && node.checked) {
            return false;
        }

        if (this._map.hasLayer(n_obj.layer)) {
            this._map.removeLayer(n_obj.layer);
        }

        obj.target.parentNode.remove();

        return false;
    },

    _expand: function() {
        L.DomUtil.addClass(this._container, 'leaflet-control-layers-expanded');
    },

    _collapse: function() {
        this._container.className = this._container.className.replace(' leaflet-control-layers-expanded', '');
    }
});

L.Control.styledLayerControl = function(baseLayers, overlays, options) {
    return new L.Control.StyledLayerControl(baseLayers, overlays, options);
};
L.BingLayer = L.TileLayer.extend({
	options: {
		subdomains: [0, 1, 2, 3],
		type: 'Aerial',
		attribution: 'Bing',
		culture: ''
	},

	initialize: function(key, options) {
		L.Util.setOptions(this, options);

		this._key = key;
		this._url = null;
		this.meta = {};
		this.loadMetadata();
	},

	tile2quad: function(x, y, z) {
		var quad = '';
		for (var i = z; i > 0; i--) {
			var digit = 0;
			var mask = 1 << (i - 1);
			if ((x & mask) !== 0) digit += 1;
			if ((y & mask) !== 0) digit += 2;
			quad = quad + digit;
		}
		return quad;
	},

	getTileUrl: function(p, z) {
		var zoom = this._getZoomForUrl();
		var subdomains = this.options.subdomains,
			s = this.options.subdomains[Math.abs((p.x + p.y) % subdomains.length)];
		return this._url.replace('{subdomain}', s)
				.replace('{quadkey}', this.tile2quad(p.x, p.y, zoom))
				.replace('{culture}', this.options.culture);
	},

	loadMetadata: function() {
		var _this = this;
		var cbid = '_bing_metadata_' + L.Util.stamp(this);
		window[cbid] = function (meta) {
			_this.meta = meta;
			window[cbid] = undefined;
			var e = document.getElementById(cbid);
			e.parentNode.removeChild(e);
			if (meta.errorDetails) {
				return;
			}
			_this.initMetadata();
		};
		var url = document.location.protocol + '//dev.virtualearth.net/REST/v1/Imagery/Metadata/' + this.options.type + '?include=ImageryProviders&jsonp=' + cbid +
		          '&key=' + this._key + '&UriScheme=' + document.location.protocol.slice(0, -1);
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = url;
		script.id = cbid;
		document.getElementsByTagName('head')[0].appendChild(script);
	},

	initMetadata: function() {
		var r = this.meta.resourceSets[0].resources[0];
		this.options.subdomains = r.imageUrlSubdomains;
		this._url = r.imageUrl;
		this._providers = [];
		if (r.imageryProviders) {
			for (var i = 0; i < r.imageryProviders.length; i++) {
				var p = r.imageryProviders[i];
				for (var j = 0; j < p.coverageAreas.length; j++) {
					var c = p.coverageAreas[j];
					var coverage = {zoomMin: c.zoomMin, zoomMax: c.zoomMax, active: false};
					var bounds = new L.LatLngBounds(
							new L.LatLng(c.bbox[0]+0.01, c.bbox[1]+0.01),
							new L.LatLng(c.bbox[2]-0.01, c.bbox[3]-0.01)
					);
					coverage.bounds = bounds;
					coverage.attrib = p.attribution;
					this._providers.push(coverage);
				}
			}
		}
		this._update();
	},

	_update: function() {
		if (this._url === null || !this._map) return;
		this._update_attribution();
		L.TileLayer.prototype._update.apply(this, []);
	},

	_update_attribution: function() {
		var bounds = this._map.getBounds();
		var zoom = this._map.getZoom();
		for (var i = 0; i < this._providers.length; i++) {
			var p = this._providers[i];
			if ((zoom <= p.zoomMax && zoom >= p.zoomMin) &&
					bounds.intersects(p.bounds)) {
				if (!p.active && this._map.attributionControl)
					this._map.attributionControl.addAttribution(p.attrib);
				p.active = true;
			} else {
				if (p.active && this._map.attributionControl)
					this._map.attributionControl.removeAttribution(p.attrib);
				p.active = false;
			}
		}
	},

	onRemove: function(map) {
		for (var i = 0; i < this._providers.length; i++) {
			var p = this._providers[i];
			if (p.active && this._map.attributionControl) {
				this._map.attributionControl.removeAttribution(p.attrib);
				p.active = false;
			}
		}
        	L.TileLayer.prototype.onRemove.apply(this, [map]);
	}
});

L.bingLayer = function (key, options) {
    return new L.BingLayer(key, options);
};
    </script>
		
		<style>
			#map {
				width:100%;
				height:100%;
		    }
			.leaflet-google-layer{
				z-index: 0;
			}
			.leaflet-map-pane{
				z-index: 100;
			}
			@font-face {
    font-family: BebasNeueRegular;
    src: url(fonts/BebasNeue-webfont.woff);
}

@font-face {
    font-family: Alegreya-Regular;
    src: url(fonts/Alegreya-Regular.ttf);
}

@font-face {
    font-family: Ubuntu-Medium;
    src: url(fonts/Ubuntu-Medium.ttf);
}

@font-face {
    font-family: Ubuntu-Regular;
    src: url(fonts/Ubuntu-Regular.ttf);
}



.ac-container{
	width: auto;
	margin: 10px auto 10px auto;
	text-align: left;
	overflow-y: auto;
	overflow-x: hidden;
	height: auto;
}
.ac-container label{
	font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
	padding: 5px 20px;
	position: relative;
	z-index: 20;
	display: block;
	height: 30px;
	cursor: pointer;
	color: #777;
	text-shadow: 1px 1px 1px rgba(255,255,255,0.8);
	line-height: 33px;
	font-size: 19px;
	background: #ffffff;
	background: -moz-linear-gradient(top, #ffffff 1%, #eaeaea 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#ffffff), color-stop(100%,#eaeaea));
	background: -webkit-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
	background: -o-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
	background: -ms-linear-gradient(top, #ffffff 1%,#eaeaea 100%);
	background: linear-gradient(top, #ffffff 1%,#eaeaea 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 );
	box-shadow: 
		0px 0px 0px 1px rgba(155,155,155,0.3), 
		1px 0px 0px 0px rgba(255,255,255,0.9) inset, 
		0px 2px 2px rgba(0,0,0,0.1);
    box-sizing: content-box;
}
.ac-container label:hover{
	background: #fff;
}
.ac-container input.menu:checked + label,
.ac-container input.menu:checked + label:hover{
	background: #c6e1ec;
	color: #3d7489;
	text-shadow: 0px 1px 1px rgba(255,255,255, 0.6);
	box-shadow: 
		0px 0px 0px 1px rgba(155,155,155,0.3), 
		0px 2px 2px rgba(0,0,0,0.1);
}
.ac-container label:hover:after,
.ac-container input.menu:checked + label:hover:after{
	content: '';
	position: absolute;
	width: 24px;
	height: 24px;
	right: 13px;
	top: 7px;
	background: transparent url(images/arrow_down.png) no-repeat center center;	
}
.ac-container input.menu:checked + label:hover:after{
	background-image: url(images/arrow_up.png);
}
.ac-container input.menu{
	display: none;
}
.ac-container article{
	background: rgba(255, 255, 255, 0.5);
	margin-top: -1px;
	overflow: hidden;
	height: 0px;
	position: relative;
	z-index: 10;
	-webkit-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
	-moz-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
	-o-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
	-ms-transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
	transition: height 0.3s ease-in-out, box-shadow 0.6s linear;
}

.ac-container input.menu:checked ~ article{
	-webkit-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
	-moz-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
	-o-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
	-ms-transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
	transition: height 0.5s ease-in-out, box-shadow 0.1s linear;
	box-shadow: 0px 0px 0px 1px rgba(155,155,155,0.3);
}

.ac-container input.menu:checked ~ article.ac-large{
	height: auto;
	max-height : 100px;
	padding-top: 5px;
	overflow-y: auto;
}

.menu-item-radio{
	font-family: 'Ubuntu-Regular', Arial, sans-serif;
	font-size: 13px;
	
}

.menu-item-checkbox{
	font-family: 'Ubuntu-Regular', Arial, sans-serif;
	font-size: 13px;
	
}

.bt_delete{
    position: relative;
	float: right;
	background-image: url(images/delete.png); 
    background-color: transparent; 
    background-repeat: no-repeat;  
    background-position: 0px 0px;  
    border: none;           
    cursor: pointer;        
    height: 16px;   
    width: 16px;	
    vertical-align: middle; 
}

.leaflet-control-layers:hover {
	box-shadow: 0 1px 5px rgba(0,0,0,0.4);
	background: #e0e3ec url(images/bgnoise_lg.jpg) repeat top left;
	border-radius: 5px;
}



        </style>
		
    </head>
    <body>
	
	    <div id="map"></div>
	
	    <script>
		
		    // Google layers
		    var g_roadmap   = new L.Google('ROADMAP');
			var g_satellite = new L.Google('SATELLITE');
			var g_terrain   = new L.Google('TERRAIN');
			
			// OSM layers
			var osmUrl='http://{s}.tile.osm.org/{z}/{x}/{y}.png';
			var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
			var osm = new L.TileLayer(osmUrl, {attribution: osmAttrib});
			
			// Bing layers
			var bing1 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {type: 'Aerial'});
			var bing2 = new L.BingLayer("AvZ2Z8Jve41V_bnPTe2mw4Xi8YWTyj2eT87tSGSsezrYWiyaj0ldMaVdkyf8aik6", {type: 'Road'});
			
			// Sao Paulo Soybeans Plant
			var soybeans_sp = new L.LayerGroup();
			L.marker([-22, -49.80]).addTo(soybeans_sp),
			L.marker([-23, -49.10]).addTo(soybeans_sp),
			L.marker([-21, -49.50]).addTo(soybeans_sp);
			
			// Sao Paulo Corn Plant
			var corn_sp = new L.LayerGroup();
			L.marker([-22, -48.10]).addTo(corn_sp),
			L.marker([-21, -48.60]).addTo(corn_sp);
			
			// Rio de Janeiro Bean Plant
			var bean_rj = new L.LayerGroup();
			L.marker([-22, -42.10]).addTo(bean_rj),
			L.marker([-23, -42.78]).addTo(bean_rj);
			
			// Rio de Janeiro Corn Plant
			var corn_rj = new L.LayerGroup();
			L.marker([-22, -43.20]).addTo(corn_rj),
			L.marker([-23, -43.50]).addTo(corn_rj);
			
			// Rio de Janeiro Rice Plant
			var rice_rj = new L.LayerGroup();
			L.marker([-22, -42.90]).addTo(rice_rj),
			L.marker([-22, -42.67]).addTo(rice_rj),
			L.marker([-23, -42.67]).addTo(rice_rj);
			
			// Belo Horizonte Sugar Cane Plant
			var sugar_bh = new L.LayerGroup();
			L.marker([-19, -44.90]).addTo(sugar_bh),
			L.marker([-19, -44.67]).addTo(sugar_bh);
			
			// Belo Horizonte Corn Plant
			var corn_bh = new L.LayerGroup();
			L.marker([-19.45, -45.90]).addTo(corn_bh),
			L.marker([-19.33, -45.67]).addTo(corn_bh);

				
			var map = L.map('map', {
				center: [-16, -54],
				zoom: 4
			});
		
		    map.addLayer(bing2);
			
			var baseMaps = [
			                { 
								groupName : "Google Base Maps",
								expanded : true,
								layers    : {
									"Satellite" :  g_satellite,
									"Road Map"  :  g_roadmap,
									"Terreno"   :  g_terrain
								}
					        }, {
							    groupName : "OSM Base Maps",
								layers    : {
									"OpenStreetMaps" : osm
								}
                            }/*, {
							    groupName : "Bing Base Maps",
								layers    : {
									"Satellite" : bing1,
									"Road"      : bing2
							  }
                            } */							
			];
					
			var overlays = [
							 {
								groupName : "Sao Paulo",
								expanded : true,
								layers    : { 
									"Soybeans Plant" : soybeans_sp,
									"Corn Plant" 	 : corn_sp
								}	
                             }, {
								groupName : "Rio de Janeiro",
								expanded : true,
								layers    : { 
									"Bean Plant"     : bean_rj,
									"Corn Plant" 	 : corn_rj,
									"Rice Plant"	 : rice_rj		
								}	
                             }, {
								groupName : "Belo Horizonte",
								layers    : { 
									"Sugar Cane Plant"	: sugar_bh		
								}	
                             }							 
			];
			
			// configure StyledLayerControl options for the layer soybeans_sp
			soybeans_sp.StyledLayerControl = {
				removable : true,
				visible : false
			}

			// configure the visible attribute with true to corn_bh
			corn_bh.StyledLayerControl = {
				removable : false,
				visible : true
			}
			
			var options = {
				container_width 	: "300px",
				group_maxHeight     : "80px",
				//container_maxHeight : "350px", 
				exclusive       	: false,
				collapsed : true, 
				position: 'topright'
			};
		
		    var control = L.Control.styledLayerControl(baseMaps, overlays, options);
			map.addControl(control);
			
			// test for adding new base layers dynamically
			// to create a new group simply add a layer with new group name
			control.addBaseLayer( bing1, "Bing Satellite", {groupName : "Bing Maps", expanded: true} );
			control.addBaseLayer( bing2, "Bing Road", {groupName : "Bing Maps"} );
			
			// test for adding new overlay layers dynamically
			control.addOverlay( corn_bh, "Corn Plant", {groupName : "Belo Horizonte"} ); 
			
			//control.removeLayer( corn_sp );
			
			//control.removeGroup( "Rio de Janeiro");

			control.selectLayer(corn_sp); 
			//control.unSelectLayer(corn_sp); 

			control.selectGroup("Rio de Janeiro");
			//control.unSelectGroup("Rio de Janeiro");
			
			var popup = L.popup()
			.setLatLng([-16, -54])
			.setContent("The data that appears in this application are fictitious and do not represent actual data!")
			.openOn(map);
			
			
		
		</script>  

	    
    </body>

</html>

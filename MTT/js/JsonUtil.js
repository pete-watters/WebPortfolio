
        function JsonUtil() {
            /**
             * Given a provided object,
             * return a string representation of the object type.
             */
            this.isType = function (obj_) {
                if (obj_ === null) {
                    return "null";
                }
                if (obj_ === NaN) {
                    return "Nan";
                }
                var _type = typeof obj_;
                switch (_type) {
                case "undefined":
                    return "undefined";
                case "number":
                    return "number";
                case "boolean":
                    return "boolean";
                case "string":
                    return "string";
                case "function":
                    return "function";
                case "object":
                    if (this.isArray(obj_)) {
                        return "array";
                    }
                    return "associative";
                }
            },
            /**
             * Recursively search and display array as an HTML table.
             */
            this.tableifyArray = function (array_) {
                if (array_.length === 0) {
                    return "[ empty ]";
                }

                var _out = "";
                for (var i = array_.length - 1; i >= 0; i--) {
                        if(array_[i].value){
                                // As part of this code JSON objects are autosorted
                                // here I break that as the image and description return as arrays
                                // i want to display them as text but maintain the JSON object sort
                                var cleanString = this.tableifyObject(array_[i]);
                                cleanString = cleanString.replace("<div class='well'>", "").replace("</div>", "");
                             _out +=  cleanString;

                        }else{
                        _out +=  this.tableifyObject(array_[i]);
                        }
                }
                _out += "";
                return _out;
            },
            /**
             * Recursively search and display common javascript types as an HTML table.
             */
            this.tableifyObject = function (obj_) {                
                switch (this.isType(obj_)) {
                case "null":
                    return "null";
                case "undefined":
                    return "undefined";
                case "number":
                    return obj_;
                case "boolean":
                    return obj_;
                case "string":
                    return obj_;
                case "array":
                    return this.tableifyArray(obj_);
                case "associative":
                    return this.tableifyAssociative(obj_);
                }
                return "!error converting object!";
            },
            /**
             * Recursively search and display associative array as an HTML table.
             */
            this.tableifyAssociative = function (array_) {
                if (this.isEmpty(array_)) {
                    return "{ empty }";
                }
                var identifier;
                // if this array exists its at the top level
                if(array_.current_condition){
                    identifier = "weather-container-parent";
                }

                var _out = "<div class='well'>";
                     
                        
                for (var _index in array_) {
                        _out += "<div class='"+identifier+"'>" ;
                    _out += "<span class='"+_index+" weatherLabel'>"+ _index + "</span>" ;
                        /*
                         *    if the index is type 'value' -> check if it contains the world weather URL 
                         *   this can help make a best guess its an image
                        */                         
                    if((_index === "value") && (/www.worldweatheronline.com/.test(array_[_index]))){                
                        _out +=   "<img src='" + this.tableifyObject(array_[_index]) + "' /> ";           
                    }else{
                        // text value
                    _out +=   "<span> " + this.tableifyObject(array_[_index]) + "</span><br />";                        
                            
                    }       
                    _out += "</div>";
                }
                _out += "</div>";
                return _out;
            },
            /**
             * identify if an associative array is empty
             */
            this.isEmpty = function (map_) {
                for (var _key in map_) {
                    if (map_.hasOwnProperty(_key)) {
                        return false;
                    }
                }
                return true;
            },
            /**
             * Identify is an array is a 'normal' (not associative) array
             */
            this.isArray = function (v_) {
                return Object.prototype.toString.call(v_) == "[object Array]";
            },
            /**
             * given the desire to populate a map of maps, adds a master key,
             * and child key and value to a provided object.
             */
            this.addToMapOfMaps = function (map_, mkey_, key_, value_) {
                if (map_ === undefined) {
                    map_ = {};
                }
                if (map_[mkey_] === undefined) {
                    map_[mkey_] = {}
                }
                if (map_[mkey_][key_] === undefined) {
                    map_[mkey_][key_] = null;
                }
                map_[mkey_][key_] = value_;
                return map_;
            }
        }
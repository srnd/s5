window['_util'] = {
    ajax: function(getpost, url, data, success, failure) {
        var http = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

        http.onreadystatechange = function() {
            if (http.readyState == 4 && http.status == 200) {
                success(JSON.parse(http.responseText));
            } else {
                if (typeof(failure) !== 'undefined') {
                    failure(http.responseText);
                }
            }
        }



        if (this.obj_size(data) > 0) {
            var params = this.obj_serialize_urlencode(data);
            if (getpost.toUpperCase() === 'GET') {
                if (url.indexOf('?') === -1) {
                    url += '?';
                } else {
                    url += '&';
                }
                url += params;

                http.open(getpost.toUpperCase(), url, true);
                http.send();
            } else {
                http.open(getpost.toUpperCase(), url, true);
                http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http.send(params);
            }
        } else {
            http.open(getpost.toUpperCase(), url, true);
            http.send();
        }
    },

    obj_size: function(obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    },

    obj_serialize_urlencode: function(obj, prefix) {
        var str = [];
        for(var p in obj) {
            var k = prefix ? prefix + "[" + p + "]" : p, v = obj[p];
            str.push(typeof v == "object" ?
                this.obj_serialize_urlencode(v, k) :
                encodeURIComponent(k) + "=" + encodeURIComponent(v));
        }
        return str.join("&");
    }
};
// JavaScript - mapapp.js
function init()
{
    var map = L.map ("map1");

    var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";

    L.tileLayer
        ("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: attrib } ).addTo(map);
            

    var pos = [50.908, -1.4];            
    map.setView(pos, 14);

    L.marker(pos).addTo(map)
    //y then x then z
};
import bootstrap from 'bootstrap/dist/js/bootstrap';
console.debug("situation module started1");
var myModal = new bootstrap.Modal(document.getElementById('forcedmodal'), {});
myModal.show();

axios.get("/base/situation").then(response => {
    $('#open-situation-list').empty();
    response.data.forEach((layer) => {
       $('#open-situation-list').append($('<option>', {
          value: layer["id"],
          text: layer["Displayname"]
       }));
    });
 });

 
axios.get("/base/alarminbox").then(response => {
    $('#open-alarminbox-list').empty();
    response.data.forEach((layer) => {
       $('#open-alarminbox-list').append($('<option>', {
          value: layer["id"],
          text: layer["name"]
       }));
    });
 });

let add_barber_form = document.getElementById('add_barber_form');

add_barber_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_barber();
});

function add_barber()
{
    let data = new FormData();
    data.append('add_barber','');
    data.append('name',add_barber_form.elements['name'].value);
    data.append('area',add_barber_form.elements['area'].value);
    data.append('price',add_barber_form.elements['price'].value);
    data.append('desc',add_barber_form.elements['desc'].value);

    let features = [];

    add_barber_form.elements['features'].forEach(el =>{
        if(el.checked){
            features.push(el.value);
        }
    });

    let services = [];

    add_barber_form.elements['services'].forEach(el =>{
        if(el.checked){
            services.push(el.value);
        }
    });

    data.append('features', JSON.stringify(features));
    data.append('services',JSON.stringify(services));

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);

    xhr.onload = function(){
        var myModal = document.getElementById('add-barber');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText ==1){
            alert('success','New barber added!');
            add_barber_form.reset();
            get_all_barbers();
        }
        else{
            alert('error','Server Down!');
        }
    }
    xhr.send(data);
}

function get_all_barbers()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('barber-data').innerHTML = this.responseText;
    }

    xhr.send('get_all_barbers');
}

let edit_barber_form = document.getElementById('edit_barber_form');

function edit_details(id)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        let data = JSON.parse(this.responseText);

        edit_barber_form.elements['name'].value = data.barberdata.name;
        edit_barber_form.elements['area'].value = data.barberdata.area;
        edit_barber_form.elements['price'].value = data.barberdata.price;
        edit_barber_form.elements['desc'].value = data.barberdata.description;
        edit_barber_form.elements['barber_id'].value = data.barberdata.id;
        
        edit_barber_form.elements['features'].forEach(el =>{
            if(data.features.includes(Number(el.value))){
                el.checked = true;
            }
        });

        edit_barber_form.elements['services'].forEach(el =>{
            if(data.services.includes(Number(el.value))){
                el.checked = true;
            }
        });
    }

    xhr.send('get_barber='+id);
}

edit_barber_form.addEventListener('submit',function(e){
    e.preventDefault();
    submit_edit_barber();
});

function submit_edit_barber()
{
    let data = new FormData();
    data.append('edit_barber','');
    data.append('barber_id',edit_barber_form.elements['barber_id'].value);
    data.append('name',edit_barber_form.elements['name'].value);
    data.append('area',edit_barber_form.elements['area'].value);
    data.append('price',edit_barber_form.elements['price'].value);
    data.append('desc',edit_barber_form.elements['desc'].value);

    let features = [];

    edit_barber_form.elements['features'].forEach(el =>{
        if(el.checked){
            features.push(el.value);
        }
    });

    let services = [];

    edit_barber_form.elements['services'].forEach(el =>{
        if(el.checked){
            services.push(el.value);
        }
    });

    data.append('features', JSON.stringify(features));
    data.append('services',JSON.stringify(services));

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);

    xhr.onload = function(){
        var myModal = document.getElementById('edit-barber');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText ==1){
            alert('success','Barber data edited!');
            edit_barber_form.reset();
            get_all_barbers();
        }
        else{
            alert('error','Server Down!');
        }
    }
    xhr.send(data);
}

function toggle_status(id,val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText ==1){
            alert('success','Status toggled!');
            get_all_barbers();
        }
        else{
            alert('success','Server Down!');
        }
    }

    xhr.send('toggle_status='+id+'&value='+val);
}

let add_image_form = document.getElementById('add_image_form');

add_image_form.addEventListener('submit',function(e){
    e.preventDefault();
    add_image();
});

function add_image()
{
    let data = new FormData();

    data.append('image',add_image_form.elements['image'].files[0]);
    data.append('barber_id',add_image_form.elements['barber_id'].value);
    data.append('add_image','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);
    


    xhr.onload = function()
    {

        if(this.responseText == 'inv_img'){
            alert('error','Only JPG, WEBP or PNG images are allowed!','image-alert');
        }
        else if(this.responseText == 'inv_size'){
            alert('error','Image should be less than 2MB!','image-alert');
        }
        else if(this.responseText == 'upd_failed'){
            alert('error','Image upload failed. Server Down!','image-alert');
        }
        else{
            alert('success','New image added!','image-alert');
            barber_images(add_image_form.elements['barber_id'].value,document.querySelector("#barber-images .modal-title").innerText);
            add_image_form.reset();
            
        }

    }
    
    xhr.send(data);
}

function barber_images(id,rname)
{
    document.querySelector("#barber-images .modal-title").innerText = rname;
    add_image_form.elements['barber_id'].value = id;
    add_image_form.elements['image'].value = '';

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('barber-image-data').innerHTML = this.responseText;
    }

    xhr.send('get_barber_images='+id);
}

function rem_image(img_id,barber_id)
{
    let data = new FormData();
    data.append('image_id',img_id);
    data.append('barber_id',barber_id);
    data.append('rem_image','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);

    xhr.onload = function()
    {
        if(this.responseText == 1){
            alert('success','Image Removed!','image-alert');
            barber_images(barber_id,document.querySelector("#barber-images .modal-title").innerText);
        }
        else{
            alert('error','Image removal failed!','image-alert');
        }
    }
    xhr.send(data);
}

function thumb_image(img_id,barber_id)
{
    let data = new FormData();
    data.append('image_id',img_id);
    data.append('barber_id',barber_id);
    data.append('thumb_image','');

    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/barbers.php",true);

    xhr.onload = function()
    {
        if(this.responseText == 1){
            alert('success','Image Thumbnail Changed!','image-alert');
            barber_images(barber_id,document.querySelector("#barber-images .modal-title").innerText);
        }
        else{
            alert('error','Thumbnail removal failed!','image-alert');
        }
    }
    xhr.send(data);
}

function remove_barber(barber_id)
{
    if(confirm("Are you sure, you want to delete this barber?"))
    {
        let data = new FormData();
        data.append('barber_id',barber_id);
        data.append('remove_barber','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/barbers.php",true);

        xhr.onload = function()
        {
            if(this.responseText == 1){
                alert('success','Barber Removed!');
                get_all_barbers();
            }
            else{
                alert('error','Barber removal failed!');
            }
        }
        xhr.send(data);
    }
    
}




window.onload = function(){
    get_all_barbers();
}
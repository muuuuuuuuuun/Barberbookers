
        let feature_s_form = document.getElementById('feature_s_form');
        let service_s_form = document.getElementById('service_s_form');

        feature_s_form.addEventListener('submit',function(e){
            e.preventDefault();
            add_feature();
        });

        function add_feature()
        {
            let data = new FormData();
            data.append('name',feature_s_form.elements['feature_name'].value);
            data.append('add_feature','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);

            xhr.onload = function(){
                var myModal = document.getElementById('feature-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if(this.responseText == 1){
                    alert('success','New feature added!');
                    feature_s_form.elements['feature_name'].value ='';
                    get_features();
                }
                else{
                    alert('error','Server Down!');
                }
            }
            xhr.send(data);
        }

        function get_features()
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            xhr.onload = function(){
                document.getElementById('features-data').innerHTML = this.responseText;
            }
            xhr.send('get_features');
        }

        function rem_feature(val)
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            xhr.onload = function(){
                if(this.responseText == 1){
                    alert('success','Feature removed!');
                    get_features();
                }
                else if(this.responseText == 'barber_added'){
                    alert('error','Feature is added in Barber section!');
                }
                else{
                    alert('error','Server down!');
                }
            }
            xhr.send('rem_feature='+val);
        }

        service_s_form.addEventListener('submit',function(e){
            e.preventDefault();
            add_service();
        });

        function add_service()
        {
            let data = new FormData();
            data.append('name',service_s_form.elements['service_name'].value);
            data.append('icon',service_s_form.elements['service_icon'].files[0]);
            data.append('add_service','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);

            xhr.onload = function(){
                var myModal = document.getElementById('service-s');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if(this.responseText == 'inv_img'){
                    alert('error','Only SVG images are allowed!');
                }
                else if(this.responseText == 'inv_size'){
                    alert('error','Image should be less than 1MB!');
                }
                else if(this.responseText == 'upd_failed'){
                    alert('error','Image upload failed. Server Down!');
                }
                else{
                    alert('success','New service added!');
                    service_s_form.reset();
                    get_services();
                }
            }

            xhr.send(data);
        }

        function get_services()
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            xhr.onload = function(){
                document.getElementById('services-data').innerHTML = this.responseText;
            }
            xhr.send('get_services');
        }

        function rem_service(val)
        {
            let xhr = new XMLHttpRequest();
            xhr.open("POST","ajax/features_services.php",true);
            xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

            xhr.onload = function(){
                if(this.responseText == 1){
                    alert('success','Service removed!');
                    get_services();
                }
                else if(this.responseText == 'barber_added'){
                    alert('error','Service is added in Barber section!');
                }
                else{
                    alert('error','Server down!');
                }
            }
            xhr.send('rem_service='+val);
        }

        window.onload = function(){
            get_features();
            get_services();
        }
    
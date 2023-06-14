 <script type="text/javascript">
            function AddformStartCondition(id){
                var checkbox = document.getElementById('startcondition_'+id+'_checkbox');
                if(checkbox.checked){
                    var form = document.getElementById('formStartCondition');
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'startcondition[]';
                    input.value = id;
                    form.appendChild(input);
                }
                else{
                    var form = document.getElementById('formStartCondition');
                    var input = document.getElementsByName('startcondition[]');
                    for(var i = 0; i < input.length; i++){
                        if(input[i].value == id){
                            form.removeChild(input[i]);
                        }
                    }
                }
            }
          function AddformFinishCondition(id){
           var checkbox = document.getElementById('finishcondition_'+id+'_checkbox');
if(checkbox.checked){
               var form = document.getElementById('formFinishCondition');
               var input = document.createElement('input');
               input.type = 'hidden';
               input.name = 'finishcondition[]';
               input.value = id;
               form.appendChild(input);
           }
           else{
               var form = document.getElementById('formFinishCondition');
               var input = document.getElementsByName('finishcondition[]');
               for(var i = 0; i < input.length; i++){
                   if(input[i].value == id){
                       form.removeChild(input[i]);
                   }
               }
           }
          }
        function  TrashAllSelectItem(item,order){
         var checkbox = document.getElementById('item_'+item+'_'+order+'_checkbox');
         if(checkbox.checked){
             var form = document.getElementById('selectItems');
             var input = document.createElement('input');
             input.type = 'hidden';
             input.name = 'items[]';
             input.value = item+'_'+order;
             form.appendChild(input);
         }
         else{
             var form = document.getElementById('selectItems');
             var input = document.getElementsByName('items[]');
             for(var i = 0; i < input.length; i++){
                 if(input[i].value == item+'_'+order){
                     form.removeChild(input[i]);
                 }
             }
         }

        }
     @if(session("alert_blank_".$blank->id)==null)
    alert("{{__('Attantion!!!! After chenge blanks, All stat will be falt.')}}");
    <?php Illuminate\Support\Facades\Session::put(
        "alert_blank_" . $blank->id,
        now()
    ); ?>
    @endif
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    // dowload page and has last item navigate to last item
    @isset($newitem)
        window.onload = function() {
            window.location.hash = 'item_{{$newitem->id}}';
        };
    @endisset
    @isset($message)
        alert('{{$message}}');
    @endisset
    @isset($_GET['item_id'])
    window.onload = function() {
        window.location.hash = 'item_{{$_GET["item_id"]}}';
    };
    @endisset

    CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: 'form'
            })

    const inputField = document.getElementById('description');
    const outputField = document.getElementById('nameItem');
      inputField.addEventListener('input', (event) => {
    //    alert(22222);
    let inputValue = event.target.value;

    if (inputValue.length > 25) {
        inputValue = inputValue.substring(0, 25);
    }

    outputField.value = inputValue;
    });

    outputField.addEventListener('input', (event) => {
    const outputValue = event.target.value;
    });
    // �������� �������� ��������� hash �� ������� GET
    var hash = window.location.search.match(/hash=([^&]+)/);
    if (hash) {
        // ��������� ������� ������ � �������� URL-������
        window.location.hash = hash[1];
    }
    // �������� ������ �� �������, �� ������� ����� ����������� ������� ������ ������ ����
    var element = document.body;
    var selectIdbutton = null; // ��������� ���������� ���������� ��� �������� �������� id

    // #blank_body
    // ��������� ���������� ������� contextmenu ��� ������������ ������� ������ ������ ����
    element.addEventListener('contextmenu', function(event) {
        // �������� ���������� ����� �� ��������
        var selectedText = window.getSelection().toString();
    
        // ���� ����� �������, ������� ���������
        if (selectedText) {
            // �������� ����������� ��������� �������� ��� ������������ ����
            event.preventDefault();
            // �������� ���������� ����� ����
            var x = event.clientX;
            var y = event.clientY;
            // ������� div-������� ��� ���������
            // other selectIdbutton
            var promSelectIdbutton = 'message_'+x+'_'+y;
            if(promSelectIdbutton!== selectIdbutton && document.getElementById(selectIdbutton) !==null){
             // hide  element  
             document.getElementById(selectIdbutton).style.display = 'none';
            }
            selectIdbutton = promSelectIdbutton;
            var message = document.createElement('div');

            message.id=selectIdbutton;
            message.innerHTML = '{{__("Add stamp")}} "' + selectedText + '"';
            message.style.position = 'fixed';
            message.style.top = y + 'px';
            message.style.left = x + 'px';
            message.style.backgroundColor = 'white';
            message.style.padding = '10px';
            message.style.border = '1px solid black';

            var closebutton= document.createElement('button');
             closebutton.innerHTML = 'X';
              // click  close button
             closebutton.addEventListener('click', function() {
                 // hide  element  
                 document.getElementById(selectIdbutton).style.display = 'none';
             });
             message.appendChild(closebutton);
            // ��������� ������� �� ��������
            document.body.appendChild(message);
            // ��������� ���������� ������� ����� �� ���������
            message.addEventListener('click', function() {
            // ������� ��������� ������� XMLHttpRequest
            var xhr = new XMLHttpRequest();
            // ���������� ������� ��������� ������, ������� ����� ���������� ��� ��������� ������ �� �������
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                }
            };

            // ���������� ������ �� ������
            var formData = new FormData();  
            formData.append('selectedText', encodeURIComponent(selectedText));
            formData.append('blank', '{{$blank->id}}');
            formData.append('api_token', '{{$api_token}}');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/addstamp', true);

            // �������� ����� CSRF �� ����-���� �� ��������
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // ��������� ����� CSRF � ��������� �������
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = this.responseText;
                    var blankStamps = document.getElementById('blank_stamps');
                    blankStamps.innerHTML = response;
                }
            };

            xhr.send(formData);

            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = JSON.parse(this.responseText);
                    var blankStamps = document.getElementById('blank_stamps');
                    // �������� ���������� �������� 'blank_stamps'
                    blankStamps.innerHTML = '';
                    // ������� ������� <ul>
                    var ul = document.createElement('ul');

                    // �������� ������ ������� ������� � <li>
                    response.forEach(function(item) {
                        var li = document.createElement('li');
                        li.textContent = item.content;
                        ul.appendChild(li);
                    });

                    // �������� <ul> � �������� � id "blank_stamps"
                    blankStamps.appendChild(ul);
                }
            };


            // ������� ��������� �� ��������
            document.body.removeChild(message);
            //document.location();
        });

    }
    });


 // JavaScript ��� ��������� ������� ����������� �������������� 

        const data2 = [100, 100, 100, 100, 100, 100]; // ������ ������
        const data3 = [50, 50, 50, 50, 50, 50]; // ������ ������
        genPoligon(data2,'innerHexm');
        genPoligon(data3,'innerHexS');
        opositeLine(data2,'line0','line60','line120');
        const  mass=[
            {{$stat_blank["full"]}},
            {{$stat_blank["dificult"]}},
            {{$stat_blank["usefull"]}},
            {{$stat_blank["understand"]}},
            {{$stat_blank["detail"]}},
            {{$stat_blank["popular"]}}
        ];
        genPoligon(mass,'innerHex');
        changePoligon(event);
    </script>
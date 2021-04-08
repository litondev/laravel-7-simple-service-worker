<!DOCTYPE html>
<html>
    <head>
        <script src="{{asset('tes.js')}}"></script>
        <script src="{{asset('tes1.js')}}"></script>
    </head>
<body>

<script>
if ('serviceWorker' in navigator) {
  var newVersion = "V1";

  var version = localStorage.getItem('SW');

  !version ? localStorage.setItem('SW',newVersion) : '';

  console.log('START SW');

  navigator.serviceWorker.register("{{asset('service-worker.js')}}")
  .then(function(registration) {
    if(version != newVersion){
        registration.unregister()
            .then(function(isUnregister){
            if(isUnregister){
                console.log('UNREGISTER SW');
                localStorage.setItem('SW',newVersion);
            }
        });    
    }

    console.log('SUCCESS SW');
   }).catch(() => {    
    console.log('FAILED SW');
  });
} else {
    console.log('NOT FOUND SW');
}
</script>
</body>
</html>
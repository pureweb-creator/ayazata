<x-layout>
    <x-slot:title>Order video</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                @if (@session('error'))
                    <div class="alert alert-danger my-4">
                        {{@session('error')}}
                    </div>
                @endif

                <iframe id="vdmForm" style="max-width: 100%; margin-top: 100px" src="https://kz.videodedmoroz.ru/create/childCount/vdm2017" width="1200" height="300" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <!-- <x-footer2></x-footer2> -->

    <x-slot:customjs>
        <script>
            // listen to the iframe
            if (window.addEventListener)
                window.addEventListener("message", handleMessage);
            else
                window.attachEvent("onmessage", handleMessage);

            function handleMessage(event) {
                var messageFromSender = event.data;

                if (messageFromSender.eventType === 'alignHeight') {
                    let height = messageFromSender.height
                    if (messageFromSender.height>=1186)
                        height = 1186

                    document.getElementById('vdmForm').style.height =
                       height + 'px';
                } else if (messageFromSender.eventType === 'alignScroll') {
                    $('html, body').animate({
                        scrollTop: $("#vdmForm").offset().top
                    }, 400);
                } else if (messageFromSender.eventType === 'alignScrollSubmit') {
                    $('html, body').animate({
                        scrollTop: $("#vdmForm").offset().top
                    }, 400);
                } else if (messageFromSender.eventType==='completeOrder') {
                    document.cookie = `clientEmail=${messageFromSender.clientEmail}; path=/`;
                } else if (messageFromSender.eventType === 'confirmOrder') {
                    document.cookie = `videoId=${messageFromSender.videoId}; path=/`;
                    window.location = "{{route('order.store')}}";
                }
            }
        </script>
    </x-slot:customjs>
</x-layout>

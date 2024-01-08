<x-layout>
    <x-slot:title>Wait for your video to be ready</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (@session('status')=='ready')
                    <div class="beforeReady text-center mt-5 alert alert-success">Ожидайте. Ваше видео появится здесь в течение 5 минут, так же ссылка будет отправлена вам на почту</div>
                @endif
                <div class="video-container text-center mt-5"></div>
            </div>
        </div>
    </div>

    <!-- <x-footer2></x-footer2> -->

    <x-slot:customjs>
        <script>
            async function makeFetchRequest() {
                try {
                    // Make a fetch request
                    const response = await fetch("{{route('order.check')}}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{csrf_token()}}"
                        }
                    });

                    if (!response.ok) {
                        throw new Error(`Request failed with status: ${response.status}`);
                    }

                    const data = await response.json();

                    if (data.video_status === "ready") {

                        var videoElement = document.createElement('video')

                        videoElement.width = 640;
                        videoElement.height = 360;
                        videoElement.controls = true; // Show video controls

                        var sourceElement = document.createElement('source');
                        sourceElement.src = data.url_1080p_mp4;
                        sourceElement.type = 'video/mp4';

                        videoElement.appendChild(sourceElement);

                        document.querySelector('.video-container').appendChild(videoElement)
                        // document.querySelector('.beforeReady').remove()

                        var downloadLink = document.createElement('a')
                        downloadLink.classList.add('btn')
                        downloadLink.classList.add('download-link')
                        downloadLink.classList.add('btn_style_green')
                        downloadLink.classList.add('section-btn')
                        downloadLink.setAttribute("download", "download")
                        downloadLink.setAttribute("href", data.url_1080p_mp4)
                        downloadLink.text = "Скачать Full HD (скачать видео)"
                        document.querySelector('.video-container').appendChild(downloadLink)

                        return true; // Stop the loop
                    }

                } catch (error) {
                    console.error('Fetch error:', error.message);
                }
            }

            async function fetchDataWithDelay() {
                let stopCondition = false;
                while (!stopCondition) {
                    stopCondition = await makeFetchRequest();
                    await new Promise(resolve => setTimeout(resolve, 10000));
                }
            }

            fetchDataWithDelay();
        </script>
    </x-slot:customjs>
</x-layout>

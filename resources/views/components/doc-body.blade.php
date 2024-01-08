@props(['class'=>'page-doc p-4 mt-5'])

<div class="container">
    <div class="row">
        <div class="col-12">
            <main {{$attributes->merge(['class'=>$class])}}>
                {{$slot}}
            </main>
        </div>
    </div>
</div>

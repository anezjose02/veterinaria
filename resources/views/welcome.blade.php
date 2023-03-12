@include('layouts.user-header')

<body style="background-color: #E9FEFC">
    <div class="container-fluid">
        @include('layouts.user-sidebar')
        <div class="col px-0 text-center">
            <h1 class="mt-5">Veterinaria Animals Happy <?php ?> </h1>
            <div class="row mx-0 mt-5">
                <div class="d-flex justify-content-center">
                    <div class="card border-dark mb-3">
                        <img src="img/banner.jpg" class="card-img-top" width="900px" height="400px">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><strong>Los animales son seres vivos que merecen amor y respeto,
                                    ¡cuidémoslos y
                                    protejámoslos!</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('layouts.user-footer')

</html>

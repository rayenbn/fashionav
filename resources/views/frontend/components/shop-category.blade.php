
   <!-- product-category start -->
   <div class="product-category-area ptb-90">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-titel category-title-3">
                        <h2>Choose by category</h2>
                    </div>
                </div>
            </div> -->
            <div class="product-category-style-two">
                <div class="row">
                    @foreach ($categories as $category)
                        @if ( $loop->iteration != 3)
                        <div class="col-lg-4 col-md-4">
                        @endif
                            <div class="single-bg-benner" @if($loop->iteration == 3) style="margin-top: 20px;" @endif>
                                <a href="{{ $category->path() }}"><img src="/storage/images/category_image/{{ $category->category_image ?? ''}}" alt="{{ $category->category_image ?? 'image'}}"></a>
                            </div>
                        @if ( $loop->iteration != 2)
                            </div>
                        @endif
                        @endforeach
                </div>
               
                </div>
            </div>
        </div>
    </div>
    <!-- product-category end -->
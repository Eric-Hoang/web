<div class="col-md-3" style="background-color: #EEEEEE">
    <div class="form-group row">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Username"
                aria-describedby="addon-wrapping">
        </div>
        <div class="list-group btn-block" style="margin-top: 1rem;">
            @php
            $categories = App\Models\Category::all();
            @endphp
            <div class="list-group-item list-group-item-action active d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px" aria-current="true">
                <i class="fas fa-home fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class="fa-lg d-block" style="margin-top: .3rem"> Home </span>
                </div>
            </div>
            @foreach ($categories as $category)
            <a href="{{ route('categories.show', $category->id) }}"
                class="list-group-item list-group-item-action  d-flex align-items-center "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: 0.25rem"
                aria-current="true">
                <i class="fas {{ $category->icon }} fa-lg"></i>
                <span class="ml-3 d-flex align-items-center">
                    <span class=" d-block" style="margin-top: .15rem"> {{ $category->name }} </span>
                </span>
            </a>
            @endforeach
            <a href="{{ route('apps.most-free-download') }}" class="list-group-item list-group-item-action d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: .15rem"
                aria-current="true">
                <i class="fas fa-download fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class=" d-block" style="margin-top: .3rem">Most Free Dowload</span>
                </div>
            </a>
            <a href="{{ route('apps.most-paid-download') }}" class="list-group-item list-group-item-action d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: .15rem"
                aria-current="true">
                <i class="fas fa-hand-holding-usd fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class=" d-block" style="margin-top: .3rem">Most Paid Download</span>
                </div>
            </a>
        </div>
    </div>
</div>
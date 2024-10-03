<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-{{ $borderColor }} shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center justify-content-center text-center">
                <div class="col-8">
                    <div class="text-sm font-weight-bold text-{{ $textColor }} text-uppercase mb-1" style="font-size: 1.2rem;">
                        {{ $title }}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 1.8rem;">
                        {{ $value }}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="{{ $icon }} fa-2x text-gray-600"></i>
                </div>
            </div>
        </div>
    </div>
</div>

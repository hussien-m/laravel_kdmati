<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">طرق الدفع</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="{{ route('checkout') }}" class="">
                @csrf
                @foreach ( $methods as $method )
                <div class="form-check">
                    <label for="$method->slug">
                        <input class="form-check-input" type="radio" name="payment_method" class="radio" value="{{ $method->slug }}" />
                        {{ $method->name }}
                    </label>
                </div>
                @endforeach

                <div class="">
                    <button class="btn btn-primary" type="submit" >دفع</button>
                </div>

            </form>

        </div>
    </div>
</div>

<div class ="box">
    <div class="container">
              <h3>Sila Pilih Sektor</h3>
              @foreach ($users as $user)
                <form method="POST" action="{{ route('multiLogin2.process') }}">
                    @csrf

                        <input id="e_nl" type="hidden" class="form-control @error('username') is-invalid @enderror" oninvalid="setCustomValidity('Sila isi butiran ini')"
                        oninput="setCustomValidity('')" required
                            name="username" value="{{ $user->username }}" autocomplete="username" maxlength="12"
                            placeholder="No. Lesen">

                        @error('username')
                            <div class="col-12 alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <input type="hidden" name="multilogin" value="true">
                        <input type="hidden" name="category" value="{{ $user->category }}">

                    <button class="btn btn-block btn-lg mb-1 "
                        style="color: black; background-color: rgba(89, 194, 154, 0.801)" type="submit">
                        {{ $user->category }}</button>
                </form>
              @endforeach

        </div>
    </div>

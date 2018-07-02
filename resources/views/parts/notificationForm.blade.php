<div class="card-body">
    <form method="POST" action="{{ route('notification.send') }}" enctype="multipart/form-data">
        @csrf
        <h2>Send Notifications</h2>

        <div class="form-group row">
            <label for="receivers" class="col-sm-4 col-form-label text-md-right">Receiver</label>
            <div class="col-md-6">
                <select id="receivers" name="receivers" class="custom-select" required>
                    @foreach ($testers as $tester)
                        <option value="{{ $tester->chat_id }}">Tester {{ $tester->first_name }} ({{ $tester->driver }})
                        </option>
                    @endforeach
                    <option value="all">All subscribers</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="message" class="col-sm-4 col-form-label text-md-right">Message
                Text</label>

            <div class="col-md-6">
                <input id="message" type="text" class="form-control" name="message" required autofocus>

            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">
            Send
        </button>
    </form>
</div>

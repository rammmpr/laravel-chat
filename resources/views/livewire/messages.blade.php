<div>
    <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Groups
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @foreach ($groups as $item)
                                    <div wire:click="selectGroup({{ $item->id }})" class="list-group-item" role="button">{{ $item->name }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @if ($group != null)
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ $group->name }}</div>
                        <div class="card-body">
                            <div wire:poll.750ms class="list-group list-group-flush overflow-auto" style="max-height: 300px; display: flex; flex-direction:column-reverse">
                                @foreach ($chats as $item)
                                    <div class="list-group-item mb-4 @if($item->user_id == $user->id) text-end @endif" role="button">
                                        <div>[{{ $item->created_at }}] {{ $item->user->name }}</div>
                                        <div>{{ $item->message }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex">
                                <input wire:model="myText" type="text" class="form-control me-3 @error('myText') is-invalid @enderror" placeholder="Messages...">
                                <button wire:click="send" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if($message = flash()->get())
    <div class="{{ $message->class() }} p-5">
        {{ $message->messsage() }}
    </div>
@endif

<?php

namespace Support\Testing;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class FakerImageProvider extends Base
{
    public function fixturesImage(string $fixturesDir, string $storageDir):string
    {
        if(!Storage::exists($storageDir)) {
            Storage::makeDirectory($storageDir);
        }

//        dd(storage_path('app/public/' . $storageDir), !Storage::exists($storageDir));
        $file = $this->generator->file(
            base_path("/tests/Fixtures/images/$fixturesDir"),
            storage_path('app/public/' . $storageDir),
            false
        );

        return '/storage/' . trim($storageDir, '/') . '/' . $file;
    }
}

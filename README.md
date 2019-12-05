##Usage

`
use Day4\Cloudinary\Cloudinary;
    ···
    public function fields(Request $request)
    {
        return [
            ···
            Cloudinary::make( __('Banner'), 'banner')
        ]
    }
`
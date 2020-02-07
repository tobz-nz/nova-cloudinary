## Setup

.env
```
CLOUDINARY_CLOUD_NAME=
CLOUDINARY_API_KEY=
```


## Usage

In Nova Resource:

```
use Day4\Cloudinary\Cloudinary;
    ···
    public function fields(Request $request)
    {
        return [
            ···
            Cloudinary::make( __('Banner'), 'banner')
        ]
    }
```
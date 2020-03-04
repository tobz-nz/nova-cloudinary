# Nova Cloudinary Field

Use to upload, browse and select resources from cloudinary.

The value stored contains the following settings: `f_auto,c_limit,w_600`, which you can replace with what ever settings you need when using the image.

**Multiple** images are seperated with `;` so can be stored in a normal text field.

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
            Cloudinary::make( __('Banner'), 'banner'),
            Cloudinary::make( __('Images'), 'images')
                ->allowMultiple(true) // Select multiple
        ]
    }
```
# Nova Cloudinary Field

This is based on https://bitbucket.org/day4/nova-cloudinary

Use to upload, browse and select resources from cloudinary.

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
    use Techful\CloudinaryField\CloudinaryField;
    
    ···
    
    public function fields(Request $request)
    {
        return [
            ···
            CloudinaryField::make( __('Banner'), 'banner'),
            CloudinaryField::make( __('Images'), 'images')
                ->allowMultiple(true) // Select multiple
        ]
    }
```

The value should be stored in a json field.

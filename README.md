# Nova Cloudinary Field

This package was originally forked form https://bitbucket.org/day4/nova-cloudinary but has diverged somewhat and is NOT backwards compatible.

Use to upload, browse and select resources from cloudinary.

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
                ->setFolder('folderName', 'resource_type) // set a default folder and optionally filter by file type 
        ]
    }
```

The value should be stored in a json field.

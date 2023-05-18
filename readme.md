A fairly basic wrapper around the awesome Trix Editor [https://trix-editor.org/](https://trix-editor.org/) to allow it to be used as a form type in Symfony.

Current things that are NOT implemented:

* Customising toolbars

This is something we use a lot in our internal projects so it assumes that you are running bootstrap 5 on some of the styling.... since that's what we do.


## File Uploads ##

File uploads can be enabled by setting `allow_uploads` in the `options` to a string containing the **ABSOLUTE URL** for the controller action.  The file will be uploaded in the file key `file`.

```php
        $builder
            ->add('field_name')
            ->add('trix', TrixEditorType::class,["allow_uploads"=>$this->router->generate("app_upload",[], UrlGeneratorInterface::ABSOLUTE_URL),])
        ;
```

**You are responsible for writing the server side persistance**.

The response should be a plain string containing the full URL of the file including the host.  This allows you to store on third party cloud services.  The status code should be 200.



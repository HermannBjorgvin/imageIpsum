imageIpsum
==========

A PHP class for placeholder image services, generating custom images of a certain size defined by the user

The class will be capable of
<ul>
    <li>Finding and mapping all images in a directory</li>
    <li>Finding an image that best fits the users desired aspect ratio</li>
    <li>Resizing images to the users desired dimensions and cropping the rest</li>
    <li>Saving images that the class creates to a directory specified to the user and updating the mapping</li>
    <li>Serving images to the user of custom dimensions, checking first a JSON map to see if the image has already been generated</li>
    <li>Note: for space saving purposes, it's best to create a scheduled script that deletes all the images and maps</li>
</ul>

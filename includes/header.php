<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>bt-2020</title>

        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
        <script src="/bt-2020/config/controllers.js"></script>
        <script src="/bt-2020/config/aframe-keyboard.min.js"></script>
        <script src="https://rawgit.com/fernandojsg/aframe-teleport-controls/master/dist/aframe-teleport-controls.min.js"></script>
    </head>

    <body>
    
        <a-scene background="color: #343d42" cursor="rayOrigin: mouse" keyboard-shortcuts="enterVR: false">
            <a-entity id="rig" position="10 4 20">
                <a-camera id="camera" camera look-controls wasd-controls="acceleration:500">
                </a-camera> 
                <a-entity vive-controls="hand: left" laser-controls="hand: left" line="color: red; opacity: 1" teleport-controls="cameraRig: #rig; teleportOrigin: #camera;"></a-entity>
                <a-entity vive-controls="hand: right" laser-controls="hand: right" line="color: red; opacity: 1" teleport-controls="cameraRig: #rig; teleportOrigin: #camera;"></a-entity>
            </a-entity>
            
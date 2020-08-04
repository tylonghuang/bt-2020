<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>bt-2020</title>

        <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
        <script src="/bt-2020/config/controllers.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/aframe-mouse-dragndrop-component@latest/dist/index.js"></script>
    </head>

    <body>
    
        <a-scene background="color: #343d42" cursor="rayOrigin: mouse">
            <a-entity camera look-controls wasd-controls="acceleration:500" position="0 3 0">
                <!-- <a-cursor>
                </a-cursor> -->
            </a-entity>

            <a-entity id="box" cursor-listener geometry="primitive: box" material="color: blue"></a-entity>
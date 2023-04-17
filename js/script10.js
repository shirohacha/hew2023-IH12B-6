// ページの読み込みを待つ
window.addEventListener("DOMContentLoaded", init);
// import { DRACOLoader } from 'js/three/jsm/loaders/DRACOLoader';

function init() {
  // サイズを指定
  const width = 246;
  const height = 335;

  // レンダラーを作成
  const canvasElement = document.querySelector("#photo_canvas10");
  const renderer = new THREE.WebGLRenderer({
    canvas: canvasElement,
  });
  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(width, height);

  // シーンを作成
  const scene = new THREE.Scene();
  scene.background = new THREE.Color(0xffffff);

  // カメラを作成
  const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
  // カメラの初期座標を設定
  camera.position.set(0, 0.5, 2);

  // カメラコントローラーを作成
  const controls = new THREE.OrbitControls(camera, canvasElement);
  controls.target.set(0, 0.4, 0);
  controls.update();

  // 平行光源を作成
  const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
  directionalLight.position.set(10, 20, 15);
  scene.add(directionalLight);

  // 環境光を追加
  const ambientLight = new THREE.AmbientLight(0xffd6ff);
  scene.add(ambientLight);

  // GLTF形式のモデルデータを読み込む
  const loader = new THREE.GLTFLoader();
  // GLTFファイルのパスを指定
  loader.load(
    "glb/i/4.2.glb",
    (glb) => {
      // 読み込み後に3D空間に追加
      const model = glb.scene;
      scene.add(model);
    },
    undefined,
    function (error) {
      console.error(error);
    }
  );

  tick();

  // 毎フレーム時に実行されるループイベントです
  function tick() {
    // レンダリング
    renderer.render(scene, camera);
    requestAnimationFrame(tick);
  }
}

// // GLTF形式のモデルデータを読み込む
// const loader = new THREE.GLTFLoader();
// // GLTFファイルのパスを指定
// loader.load('glb/2/c2.glb', (glb) => {
//   // 読み込み後に3D空間に追加
//   const model = glb.scene;
//   scene.add(model);
// });

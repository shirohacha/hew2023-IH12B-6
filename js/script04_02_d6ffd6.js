
// ページの読み込みを待つ
window.addEventListener("DOMContentLoaded", init);
// import { DRACOLoader } from 'js/three/jsm/loaders/DRACOLoader';

function init() {
  // サイズを指定
  const width = 900;
  const height = 500;

  // レンダラーを作成
  const canvasElement = document.querySelector("#photo_canvas01_04");
  const renderer04 = new THREE.WebGLRenderer({
    canvas: canvasElement,
  });
  renderer04.setPixelRatio(window.devicePixelRatio);
  renderer04.setSize(width, height);

  // シーンを作成
  const scene = new THREE.Scene();
  scene.background = new THREE.Color(0xcccccc);

  // カメラを作成
  const camera = new THREE.PerspectiveCamera(45, width / height, 0.1, 1000);
  // カメラの初期座標を設定
  camera.position.set(0, 15, -30);

  // カメラコントローラーを作成
  const controls = new THREE.OrbitControls(camera, canvasElement);
  controls.target.set(0, 0, 0);
  controls.update();

  // 平行光源を作成
  const directionalLight = new THREE.DirectionalLight(0xd6ffd6, 0.5);
  directionalLight.position.set(10, 20, 15);
  scene.add(directionalLight);

  // 環境光を追加
  const ambientLight = new THREE.AmbientLight(0xd6ffd6);
  scene.add(ambientLight);

  // GLTF形式のモデルデータを読み込む
  const loader = new THREE.GLTFLoader();
  // GLTFファイルのパスを指定
  loader.load(
    "../glb/j/game/5/c5.glb",
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
    renderer04.render(scene, camera);
    requestAnimationFrame(tick);
  }
}

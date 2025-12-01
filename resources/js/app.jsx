import './bootstrap';
import Alpine from 'alpinejs';
import React from 'react';
import { createRoot } from 'react-dom/client';
import Silk from './Components/Silk.jsx';
import LiquidEther from './Components/LiquidEther.jsx';
import Ballpit from './Components/Ballpit.jsx';
import ColorBends from './Components/ColorBends.jsx';
import SplitText from "./Components/SplitText.jsx";
import BlurText from "./Components/BlurText.jsx";


window.Alpine = Alpine;
Alpine.start();

const silkRoot = document.getElementById('react-silk-background');
const liquidEtherRoot = document.getElementById('react-liquid-ether-background');
const ballpitRoot = document.getElementById('react-ballpit-background');
const colorBendsRoot = document.getElementById('react-color-bends-background');
const splitTextRoot = document.getElementById('react-split-text');
const blurTextRoot = document.getElementById('react-blur-text');

if (blurTextRoot) {
    const handleAnimationComplete = () => {
        console.log('Animation completed!');
    };
    const textContent = blurTextRoot.dataset.text || "YOUNG ON TOP";

    createRoot(blurTextRoot).render(
        <BlurText
            text={textContent}
            delay={150}
            animateBy="words"
            direction="top"
            onAnimationComplete={handleAnimationComplete}
            className="text-2xl mb-8"
        />
    );
}

if (splitTextRoot) {
    const textContent = splitTextRoot.dataset.text || "Selamat Datang!";

    createRoot(splitTextRoot).render(
        <SplitText
            text={textContent}
            delay={30}
            duration={0.7}
            ease="power3.out"
            splitType="chars"
            from={{ opacity: 0, y: 40 }}
            to={{ opacity: 1, y: 0 }}
            threshold={0.1}
            rootMargin="-100px"
            textAlign="left"
            tag="span"
        />
    );
}

if (colorBendsRoot) {
    createRoot(colorBendsRoot).render(
        <div style={{ width: '100%', height: '100vh', position: 'absolute', top: 0, left: 0 }}>
            <ColorBends
                colors={['#eab308', '#22d3ee', '#020617']}
                grainScale={1500.0}
                grainIntensity={0.15}
            />
        </div>
    );
}

if (ballpitRoot) {
    createRoot(ballpitRoot).render(
        <div style={{
            width: '100%',
            height: '100vh',
            position: 'fixed',
            top: 0,
            left: 0,
            zIndex: -1,
            overflow: 'hidden'
        }}>
            <Ballpit
                count={100}
                gravity={0.5}
                friction={0.8}
                wallBounce={0.95}
                followCursor={true}
                colors={['#D31018', '#FFFFFF', '#1A1A1A', '#8B0000']}
            />
        </div>
    );
}

if (silkRoot) {
    createRoot(silkRoot).render(
        <Silk
            speed={5}
            scale={1}
            color="#0f01d4ff"
            noiseIntensity={1.5}
            rotation={0}
        />
    );
}

if (liquidEtherRoot) {
    createRoot(liquidEtherRoot).render(
        <div style={{ width: '100%', height: '100%', position: 'absolute', top: 0, left: 0 }}>
            <LiquidEther
                colors={['#D31018', '#FF4D4D', '#F5F5F5']}
                mouseForce={20}
                cursorSize={100}
                isViscous={false}
                viscous={30}
                iterationsViscous={32}
                iterationsPoisson={32}
                resolution={0.5}
                isBounce={false}
                autoDemo={true}
                autoSpeed={0.5}
                autoIntensity={2.2}
                takeoverDuration={0.25}
                autoResumeDelay={3000}
                autoRampDuration={0.6}
            />
        </div>
    );
}

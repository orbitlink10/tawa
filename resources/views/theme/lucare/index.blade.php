@extends('theme.lucare.layouts.main')
@section('title', 'Networking Equipment Kenya | Routers, Switches & Fibre | Tawa')
@section('meta_description', 'Shop networking equipment in Kenya from Tawa, including MikroTik routers, Ubiquiti access points, TP-Link devices, switches, fibre optic equipment, network cabinets and structured cabling.')

@section('styles')
<style>
    /* ===== Homepage first part — Dahua-style hero ===== */
    .tawa-header { background: #ffffff; border-bottom: 1px solid #eef1f4; }
    .tawa-nav > ul > li > a { color: #1a1a1a; }
    .tawa-nav > ul > li > a:hover { color: #1a1a1a; background: #f2f4f6; }
    .tawa-nav .dropdown-item:hover { color: #1a1a1a; }
    .tawa-search form { background: #ffffff; border-color: #e2e6ec; }
    .tawa-search input::placeholder { color: #9aa4af; }
    .tawa-search button { background: #088178; }
    .tawa-action:hover { color: #1a1a1a; }
    .tawa-account { background: #1a1a1a; }
    .tawa-account:hover { background: #000000; color: #fff; }
    .tawa-count { background: #1a1a1a; }

    /* ===== Homepage hero — brand product stage ===== */
    .tawa-cover-hero {
        position: relative;
        background: linear-gradient(180deg, #e8edf1 0%, #dbe3ea 70%, #d2dbe4 100%);
        overflow: hidden;
        padding: 18px 0 0;
    }
    .tawa-cover-hero::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 90px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .45) 100%);
        pointer-events: none;
    }
    .tawa-cover-inner { display: flex; flex-direction: column; min-height: 520px; }
    .tawa-cover-copy { max-width: 880px; margin: 0 auto; text-align: center; }
    .tawa-cover-eyebrow {
        display: inline-block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #64707d;
        margin-bottom: 8px;
    }
    .tawa-cover-title {
        font-weight: 900;
        color: #16181a;
        font-size: clamp(27px, 3.4vw, 46px);
        line-height: 1.05;
        letter-spacing: -1.2px;
        margin: 0 0 8px;
    }
    .tawa-cover-sub {
        font-weight: 800;
        color: #16181a;
        font-size: clamp(15px, 1.6vw, 21px);
        letter-spacing: -0.3px;
        margin: 0 0 8px;
    }
    .tawa-cover-desc {
        color: #4b5563;
        font-size: 15px;
        line-height: 1.6;
        max-width: 620px;
        margin: 0 auto 14px;
    }
    .tawa-cover-search {
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 520px;
        margin: 0 auto 22px;
        background: #ffffff;
        border: 1px solid #e2e6ec;
        border-radius: 999px;
        padding: 5px 5px 5px 22px;
        box-shadow: 0 14px 32px rgba(30, 45, 60, .10);
    }
    .tawa-cover-search input {
        flex: 1;
        min-width: 0;
        border: 0;
        outline: none;
        background: transparent;
        height: 46px;
        font-size: 16px;
        color: #253d4e;
    }
    .tawa-cover-search input::placeholder { color: #9aa4af; }
    .tawa-cover-search button {
        flex: 0 0 auto;
        border: 0;
        background: #088178;
        color: #ffffff;
        width: 58px;
        height: 46px;
        border-radius: 999px;
        cursor: pointer;
        font-size: 17px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background .15s ease;
    }
    .tawa-cover-search button:hover { background: #046963; }
    .tawa-cover-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
        flex-wrap: wrap;
    }
    .tawa-cover-hero .tawa-btn-dark {
        background: #16181a;
        border: 1px solid #16181a;
        color: #fff;
        font-weight: 700;
    }
    .tawa-cover-hero .tawa-btn-dark:hover,
    .tawa-cover-hero .tawa-btn-dark:focus {
        background: #000000;
        border-color: #000000;
        color: #fff;
    }
    .tawa-cover-link { color: #16181a; font-weight: 700; text-decoration: none; }
    .tawa-cover-link i { margin-left: 6px; }
    .tawa-cover-link:hover { color: #000000; }
    .tawa-cover-stage {
        margin-top: auto;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: clamp(18px, 3.4vw, 60px);
        padding: 34px 0 0;
        position: relative;
        z-index: 1;
    }
    .tawa-cover-item { display: block; line-height: 0; transition: transform .25s ease; }
    .tawa-cover-item img {
        height: clamp(96px, 9.5vw, 150px);
        width: auto;
        max-width: 100%;
        object-fit: contain;
        filter: drop-shadow(0 16px 20px rgba(30, 45, 60, .18));
        -webkit-box-reflect: below 4px linear-gradient(transparent 62%, rgba(120, 140, 160, .14));
    }
    .tawa-cover-item.is-featured img {
        height: clamp(160px, 16vw, 250px);
        filter: drop-shadow(0 22px 28px rgba(30, 45, 60, .22));
    }
    .tawa-cover-item:hover { transform: translateY(-6px); }
    @media (max-width: 767px) {
        .tawa-cover-hero { padding-top: 16px; }
        .tawa-cover-inner { min-height: 460px; }
        .tawa-cover-desc { display: none; }
        .tawa-cover-stage { gap: 12px; padding-top: 26px; }
        .tawa-cover-item img { height: 80px; }
        .tawa-cover-item.is-featured img { height: 132px; }
    }

    /* ===== Shop by Brand — bordered image grid ===== */
    .tawa-brand-section { background: #fff; }
    .tawa-brand-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        border-top: 1px solid #e7e7e7;
        border-left: 1px solid #e7e7e7;
    }
    .tawa-brand-tile {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 28px;
        min-height: 340px;
        padding: 40px 24px;
        background: #fff;
        border-right: 1px solid #e7e7e7;
        border-bottom: 1px solid #e7e7e7;
        text-decoration: none;
        transition: background .2s ease;
    }
    .tawa-brand-tile:hover { background: #faf9ff; }
    .tawa-brand-tile-img {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        width: 100%;
    }
    .tawa-brand-tile-img img {
        max-height: 200px;
        max-width: 100%;
        object-fit: contain;
        transition: transform .25s ease;
    }
    .tawa-brand-tile:hover .tawa-brand-tile-img img { transform: scale(1.05); }
    .tawa-brand-tile-name {
        font-size: 21px;
        font-weight: 700;
        color: #3d3d3d;
        letter-spacing: -.2px;
    }
    @media (max-width: 991px) {
        .tawa-brand-grid { grid-template-columns: repeat(2, 1fr); }
        .tawa-brand-tile { min-height: 280px; gap: 20px; }
        .tawa-brand-tile-img { height: 160px; }
        .tawa-brand-tile-img img { max-height: 160px; }
        .tawa-brand-tile-name { font-size: 18px; }
    }
    @media (max-width: 575px) {
        .tawa-brand-grid { grid-template-columns: 1fr; }
        .tawa-brand-tile { min-height: 240px; }
    }
</style>
@endsection

@section('main')



@php
    $heroSlide = $sliders->first();
    $heroCutouts = [
        'tenda' => 'data:image/webp;base64,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',
        'tp-link' => 'data:image/webp;base64,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',
        'ubiquiti' => 'data:image/webp;base64,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',
        'mikrotik' => 'data:image/webp;base64,UklGRj5AAABXRUJQVlA4WAoAAAAQAAAARgEAFwEAQUxQSLogAAABHAVt2zAJf9j7QxAREwCmxMoXVFIqfXPwRwDYNyn7/50Oh8NljLXWGGusrCRrJUmykqxkJUnWyv1L1i3JfT9PkpXnR4aVJFm55Za1kiS55ZZkrCTrtnp+/0qSJFkZY4yxxhhrjHFxnsdxXtd17ItzvP6KCIqybddtm42ZmwIFyX0BSQYf0gf4bWzbtW3btioKMgqaDQtLXuIyZtuz/dhWbInK1IptAKfSFjdQS8q59toWFSMCoiLZUqu5IChJbs01i2/9AEQEG4mAFSQAa0JOB8AdgBnwPSESswQiZkJOZdAqwwGttgqKKmCp7XJ7hSqpHyvyOPFWsZxTCeeOhrFCJeWmgy/HV1VepvJYiXHyDQ8mjQZLyR2ASfMUWIpM5/8ZERZeAbldwgEgyQO17E4qHdGBdTne0n1cKVS+7JBkh1p2kJSagBpVVmoN216rNmq2X7wFlIT0IPJbXOhOqg7oE+M2b+k+rhQqX3ZIsiMtO0hIjb+Nmu327bspSn9vo9lq+t5OYjumAQlvehVxTvJGWeU06AhkodsdH5RGpPQBukIl5ablRl8QAs3mN/NnK1SEhp2ARqPZaNrSsDXXzkrTinNXMN1fFl/04hTl1dvK6vKzLsTGsLQNGxsDxiAyEwTjdDjBgmHBsfYYTlQBS62W25dVgd/orMjjxFvF5ZyVcO4QjCtUqtx08MvwM6BYizaPlRgn3/B4EjNxt/tsebVSWa2s2lKxNdfOyq+m69TBTfNvj9tx6tKN3+08RyBfFBGiyyuKmEmETJsTsELBwRV/FFXAUvuU2cF8rjbEW8VyjukcK8NvQKik3HTwZfgZUFBU5bES4+QbHpkYwu/evbMTkLL0V/+dF35QX44zlfaxixORgDhEDBL0Mc0005ZuphvpZvo2zfRtmgmVmG5LM830MSQgh294BBNzB7qZZqX/8jNPA6D2czZiQpoL92bHpjpIGWelUpefbdWsxHEMs99bPwBy2xlDZBwkPsw6vsnBwcNdUQUstb3MDmbfHm6mrVJClmPL8BsQKlVuOvjl+OHkwx4rMU5ieHgq303lWybzlKw2XFIs3M1O/PndfJBDpxwrlEpD+muEOH7QCfF6dWv5rwrAU+STjqa7BApsPEXDPu8Nsncp//Q3TpsTLBgGIOwMJ6n40qa2l9uXVYHf6KJW1IabWKWElGNl+A0IlZSbDn4Rzx2tYdLmsRLj5BsexKP/jBX4snFGDsDU+79qeC5BgPkh1uB91zcQzVUN2lcRPatHfoAIhYbiiDqddEd0YF2Ot3QfVwqVLztIu+TxyJ9X4UOXWRIRUuOFiuht6xg5SwaRs2DanIAVNA5mI5OKofaR22VV4Dc6BTxOvFWUc5Rw7nhgVKjUuengRTwChUSbx0qMk2946NSYUkCeBgLWKyrcCu+5/MmiEsBdwUBDh6XwrldPjmrQvXrTNxBKYaUT3PXqKRXaQ74EtMLJI+FFpdLKyxQRcOu50WDH70LbbE7ndUCmztjT/KzB+O9Ce4FucvSdxv9pDjFE6X7QIbTr1X1DsQKlQ74kAGHrnQZjP4S2sk+lHk04U5B0BzZoksEyMGBGNjWAhV5Y7wHBaEuBUbPHSvsG4OqlLY2T0OmJsC7783eua5xQ7holPzDUjjXm/FRYQ6EbK1CcQfTA5lyF4qmwLvsLWxoUHNyWl6GOSjiNxC2JH4BQaOgwgk4n3REdWJfjLd3HlULlyw4euwTZokoYPU5JSWhVwopWxQvYmHv+XKNiYZZABBxw2pygYCg48PraiSpgiym3VyEFv9FFragNsUoJKcfK8BsQKik3HXwZfgYUFFV5rMQ4SdnZ2Z5K5Zil8gIUNlVCUNerxVasA+qUCVLg6r5iSOl9Uvl0zZ/yYtBYIg3d3D5uaRANx3jaoXESr2ekrHIadAZcKxU39VEbQmlESh+gV6ik3NSPyxeEQLMlmPmU+h81uHZ03JqCDrzQBOkQ0vvjfZVQOudJUd6M2pPrKzC0n1taTRR3s3h7/NmUGaSTDI5gEYGE3P4oLQzJOY75AK1QqXNTudEXhECzJZj5lHTYcZ4J08pTio5OKjB5Igrnjsa3NrQAGjvsRAxnCgqY3kg4T0Jba7FK5bxLcaGU3PWxooZvdySczc1XKhyd9qTmGtFtd6ygQiGcO9rU4fYWE6aVHUaLrUI4K0pcYykOfWYxNhLN6IQRZmmIDP9bYJw2J1gwLDi4Sq2oApbaXmYHsy+vV8PHkVVKSDlWht+AUEm56eCX44ejNUzaPFZinIRsc00L2uhhKzdv5XvBbN5UAW76UhQrPovOA0drH0K5Xi001jW4W+RpGRlsjCI6p8KnvrOEKAL+sBc4bU5QMBQcfGI8HVXAUvuU2cF8WLyh9hSPE28Vyzmmc2wbfgNCpc5NB1+GnwEFRVUeKz5Own3jYV+DGyy1HnojIthovXX42HeWLnv+GQdOmxMUDAUHolZUAUttl9nB7Mu7hcNWKSHlWBl+A0Il5aaDL8dvDhQUVXms+DgJ99p9nf/DUlOxlDucxWgRyi61e0o9U3SxAud1Kr1Q3gOqqxD9wZ8asOMimktDOiGU69XOzxr8+wVLrYZeaAWQbbdrRac5lGdPD1UeSXtQ5YMLuoAI4ILKZsHsci3W4GGNpYb4cBmr0H/9IYwX6JR4VPOmBryohXitGcizp0XNkG9iMea8EtbSWEuOYdodPyvgwE12ogrYxSyzg9ksXlCnpShqQ6xSQpZjy/AbECpVbjr45fjh5Jt4rPg4CfdyrNPMUquh+0AEePhag1fNMO7o8CslUu7I1K6rsBnGHen8u/H6T74d+SAC0OFFJ4zNiyqsN3lq39CmWRkcwvqm8QYiQhujCPHTzZ6G9f0wflfxmhLIUmNxL8Mbj1U+0AcHXicg3o6IxlYfaHAviJWSykW2rbe/+isJPFSpBJHzBQ0+Q8MPWgEbWcY6vD4Swksi8yr3cb7EcnDLyMZGImNMVYV4BY2xlg5C47Q5wYJhwcEnWyuqBgsaKtIOZrO4oPYsHifeKi7nmM6xMvwGhErKTQe/HD8crWHS5rHi48Tcz6qwEfMcmsX9i8maDvdCuF6dLykG6jpNAwBVJUJY0QlVI6btg2/QoVK4H8ILdCrN/X3jCamJo0QRAKxW2io3kHawLw87IvHyeeLTCg4+QR5lVfjLXkwAO5gPiwvqsBQ8TrxVLOeYzrEy/AaESspNB1+OH07eeKzkOEXR8OwJDUrAcxh0IezjnYwxrY7KMwqFG+Hrcmwor0HRZOgCzd9UvkBbDl+X6UKswWhSaojiMOyJGZVHPUrl8HVR4acHQ/5pQwN2BsHeZ811nRC8syc4pvL0/UGbQvqTUNNbU2ExeJQKq9tAiWsz7I8q7u3UNZ5XXwzelSWdr9QMH2QpsBSVF4DrxF80uBa8BwJ3qzAkYMKsgcZG4osjFc6cK4VuR7tRhQOYtKNtYGT4QujYtT2IPw6IjFJXpeN84LrQgsZzAqN0KLELIjuKoHy1r4Z4IfraF/AgIScZEiyLQEJuNz4ojUjpA/QKlZSb+nH5ghBotmSz3KbKjxbuHUOJQBevI4EpqnA2cCFqajA6iyBBcR8ohkmJwD2toRNKp1MMJi9E/ACjGuz9LgrbBbq8CmOzyYPpWfZziu/fZKc3Oh20Zb8O7/YcjRKX/eJwRPwzBiaNxk6PhG1HKpXhK31Ks14FGz0Xmg7kNa50TltLDjhtTlAwFByosJNVNdWYKoEBZrO4oLaMg9oQq5SQcqwMvwGhknLTwZfhZ0BBUZXHSo5TpMHYJRApgKXyAqDgoApHgnaB7oezHY3z8MveP2kMJF32hANDGpdKZyBkl4s7b1R6Xva5hhLsuIii+aAGz4ulUK1X9Sj+wSSvV4kIbPS8cKaGNfRpgpk6ZV97EW+GqpMMjmApAgm5/VtFH5RGZPcH6AqVOjctN/qCEGi2RLPOWw3+VAKRAheuPl934UEVcCJk69UtFe44V39qH91tSIVdBBxw2pygYCg4UGEnqew5yVQJDDCbxQV1WgpRG2KVElKOleE3IFRSbjr4cvzmQEFRlccKGIerH1V+lMG5y8DingER7Nz9RIPdAdus/8Ro8BNLSQwuk7jsR/OVhn/5ZhSuZX/jWazA308ak2bZzw8gdBBnRzUS2IzCdYGu8VTlXyedeIFOHMb35jitQjMXqIpauI3JlU9uQqdLOiFYXfpNpZCmC1kBG0kOE50eVyEfrDuSf33QUYFJoxxcWSmwMYrErEZ4UYUcOCICp80JCoaCwyq0q/I/7kDFBgPM5/ay/2Eeq5SQ7dg2/AaESp2bDr4MPwMKiqqYlbSj2p1YB+bOc3hYXLwdiThIcEmHYFVqP6lwO1Ul+dReiWYUrEsiSvzkdz2U8M0jQnlIg1Y1VPeA2jdUfllh1e+qEGOjXPYDmQPPNb7Ts3DdQeKSTMdv1cBhFSqrVjdoqFhggNksXlCHpeBx4q3ics5KOHc0jCtUqtx08MvxmwMFRWsxK2kHj/+twbM6OHe57J/iIYgCNEal+t82e9kIdIysAiOLxEiIxOgy4Zl7GzGhEiNZxIjRKd7hg8sq9acOFKCYFJsp5fCmE6rNrqjwrJF2M0REnwDiggpbobpAp8PzRprB/OAtGgEu6YRQdVnQoLOWrksqVj5ofOHx41y4+Xe3lXIwEWz0Z9y6rgA8DtUlkcsqf9U7iGmmLdVmOmvfp40wbTZVUVocpdgMsxgbiYQO6RGmy8U6+/qSc74sBZYai28f9WDTOjqTGrBRrlfRHkCHiiNCcNqcoGAoOKyCsqqm2gQTgAHmc3v4YR6rlJByrAy/AaGSctPBl+FnQEFRFbOSdio9N/NMmqfAUhy6xMJZQo47GvSWw7Ts1yHHpCOS9NBbvI6IOKh3eeWOFSbx8un4tILDKiirqhs0VBQYYPblJuzcbhrGCpWUmw6+HL85UFBU5bECrUozYtI8BZZi5QVABlO7VfmsQpB2tPuUBo0I0u0o1bIfGk9VCNKy/8yoAndXopSD6Xkd+XSw8TTQQQccd9Kppg3FYeUy1hilu5u3eiG6Pz5X0sFgqvvjAGz5LwGLUqV2KURnT3MaASzOF0FSQy/kJYqkACK+f9FTqvpcT+M5PdKx2vOcGLocb+ueY8NPF+JTNB4YrWmEnVHKwSQitNGjYSHqvFGBKCKmzQlYQXBYhU4qBDRUbATM5/Ln4+F61SolZDu2Db8BoVLnpoMX8QgUFEkeK6SpEZVHSndFTDoiSWvY4u1IJCrk3mXt/yrdlyPxLuz46oTDKlRWrW7QULHAALNvd5qQvt1pGFeoVLnp4Jfjh3PcIeB2B4djlQoxaZYCS4076bpgR4cAdZlSAXem7sKLTwBAK9wJz3rVjHc0BnvHCKYazI83uS8mxGHoybLGN7qmMW1I2XziWEvjPKIfnObRWKMUjkCGZrCRxDAhsTdIblOBA/NIyLQ5ASsUHFZBWVXdoKGiwACzb796akLaKiWkHCvDb0CopNx08OX4zYGCoiqPFZR0mEZi0iwFlpoVJwIbJUSsPa/BjivB+SKJSvg8PuWR5sjE0509gYmaGiwAgmHaiq9OOKxCZdWSQEPFAgNM3e7Ys01WKSGhcIdgXKFS5aaDX44fznEHFSuFeQPIpHkKLMWh+yASAvwAuYbKN82C8yRbUYOxs9KSEucrRRce7q0orNzKvdB0UaE0Dym63G1oJyjsaGZPaMKoSnCkHExxXBmQ2EcZ7USNl8QZQsO0McGCYcFhFZRVqxs0VBQYYPbl9Wq4m1VKSDlWht+AUEmhqVd3/HC0hkmbx6pJGl+DH7lg5Zk0oQwsDsAOIwH2/rOABnOBqfz2TIG5cyUrz6QJJCye6o6kNYl2kgZfBeaOZFxVYLzs5FPekbSgjSTftMTaSYmQfJFEE480ysEFPXVlXKMyf6QYlkq8odHzKqStXNxkXKNLkQ4HpcvvqpsazcdQvcvIjrsaP1c3FZSw+TpW4J7RDzg9osHBoAQdVox+gCOF0IbW+jaH1JvR0aLGKngqKJu1/qoCZtgs9XqVpjXYOxsFZL26s/5vDe5DhvVq+sre3QovCzCjAak0H8YqzdvQBc35SCOfYkC61HW451yJSRNKNHQlXiEBktvNj2kwGpArS/VHKg/tn/ZZU+J8ZaGkEgJCTYUV2BbOjgWVzda97YcdDlF0QWOsCdpQ1KiILvmHKnBYhcqqNdUmmAAMMMXiBXVYCh4nHlirlJBQuEMwrlCpQlOv7vjNgWIt2rjVk/s1FZg9MmmWAksNxdOli29WiXmMXFJpDscdyfpNlW8rPHT2Qto3Tw06IoKNErRYE6dT1qAUjvvjtRsarDWZPTFpQgmLp1+vAqgwdzIY61UdXjZAYb0qmxFZO2qFTjEYzw7VrmvwqunshbRvnkQ68sOgqCBrdyzlFdiIg/HoflUHVhHSvnkS6FnCoRcaX3+MQxpMBTOEu8OmrBGg/UNxeFNjjGvVU5maUz5zjpHTWVSg+2bth+J3zq9rLFc/9ZDZp33mHKWGFODbqXX8a/uH4i8gLsQqCOuUg5nh7AmMCq9boTh7Oq+DYfbIpHkKLEVwsnTRIhBdVOj//MBs047gqgbrm6HYkQaduAYZdnR5t0uRxolZtx6GzfZrPDe0NWJMps0yhVfrGquP9VthCOdijVAAyLTsFxAJiEGOmsq1v0c1J50IiRQ4belmupFupm/TTN+mmVCJ6bY000wfQ3g+VgkCYpCAmkl9R9Lp1O6r0AjDHckLGnSL1jHLHUnxOpKgxZpEiqHhpL0vK5cGh63ppJVlJJgAAfO53IRrzNvNA2OFSgpNvTrxCBRVtDErHWQlYtIRSgSOOKzsgsQWEW5WjQ4Pa05aLj6QSSOJFBBRWtkHzQQTgAFms7igtoyD2rBjlRJSjpXhNyBUUmjq1R2/OVBQNEyk4imVSoE5IhKT5imwFDfnMjdfVhX4+1oQODWkcePiYT4jYtHiE/Bu13wZK5QbQfjK50xRgfzeFBOTmCKCjf6MkXmgGkHY0XE1EES6KaYtnM10k9x4pcH1IITjBQVye7KGbDRVuBEI/m9U+N8bKeDd7v16X4GbzDKpUNKejtW6Twxdjrd0H1cKlS870AmFSn1kMsXEJKQoFs5yvUpspQxi3dz7pPBTYfeCsOw/MapwB/sUsZScPJPmKbAUwcl0ndOY7keFRw03nTQYp8lcwXmIFADAZ7Uk0FCxwABTLF5U21g8TjywVikhoXCHYFyhUoWmXt3xmwMFRcPU2Wz0JKDJdp1TQCQgBnF62an+veykEyGRAqct3Uw30s30bezZ1rdpJlRiui3NNNPH0MQhhYekTgIJiEEC6sntTWC0nZWofw2C0AWmnuSz/js0B8kT408thEgKeLeDHy50s700Ri7+LhhPsj17kZGrMzs9tpRyMBERbPRoWKwJIZ/eka1MrbMLOasdhgt00F6EjOESIkvJyTNpQok25/puUGh10//H1szxYbKOQdiMYM+bp9meYVsYpcybWZDcpr71lzMRIlQ4dSA1R87mKCRfJCkMf3z95VNa2g+GfIkx6YR1KjhZK4Rm9kNafjbWOxgV59Dr749S0nrxK2K2Sl4AFCADOSytg1spXx13+AiG4Y6kaJ8aSsfjKystb2JSWoBiMi77DZNcOrf8uDQ8muaX+hAMQBCW/cAc0vw2Wu7x+5WVET4amZf9iGhsJBI6xLIm5PNJiMxgqPzkVprfRiMrjEG4XIzMYejerUT+OXzYNxosJXcAJs1TYCluzis7yFW+ShHCU0lzQn9XJqxRydwlG6HpAsUsKHXhYyoE+AF8FrJ8V0reTNgF4QId31OKsPYllR1S6sEksFEGItZOXIQdgKt8k8zVsfD9xNxqQybMDsAdhbRvnhoclc3AqXyTnF3xT+H7ibnVOhsNlc2uvyVSHWBflcL3E3MpqDRS2VWfFKcSkgE4QVCE7D+WyOxRZheGC3ScYupwXFx9vJiqve02RoPUootv3MzuD8HbLF3wjwYqzQRAswIqgvPWZT8ilimJ5Tg4y/7kYJ5vIeot+3sD9vZ5bJmeoehpLAEmIGJ2Y3eSODhPETFtfgCeAjIPkQL5rdCl5kzYAZgG04yyXlnimTt5lDrok5MeEXNET0rkz9TJo5Dng4lOk7t5rDA5fGrs848GKs0EQLMCKg4nXHd9fDkmUdJUxxeCt15930XF9Wp4i/74nbt85UriZguh6TJ9IvFZ/YcvQbPLW9er6bgcmvXqSDvxInFv02iuVyVMh1jjkRhEGPwAT/+ZwNLMHifoaTdcnjsIZ7+VVGN2XJCLZO0iCzf1SiKmkDaelNCfKW8XMkzHY2SMxyr5l/paOSZ7Wi0poD0C583U7iY+wTBHV8qLi4u2/cK1hmNhsVx2HhevWmo3Li5yq8tl9qXKH5yVLVcctcXzi2Um8ofIcvkr6+g0mgYsC7PcuEwlx8JpLrXYjMBJnlxkpZwfdywe5hZWw3FtqiysdjGNg4t8cIb3OKbLfGi6M1uOw2VptT8FeU1efSCs/pzImaghFDbf/OSoCo3PfctPH+S7sxpbbr9tyedwyHL7v5vysRlH/amwePA4Z6k/lvfrxh31B/KZ4ucjluqK0Cgcdjx4JzWOutG791beRjzhNJbfyGE6jYRmUVj8cuSA4w+eQZyPvyRWbNDZ0Uu53JimdHjRRNOLa3KJ4tj8LfbTfCE1Go5GRWpsOmqeG4KdIZei5K//HHEaD3zJOsnlBDx/K4oMz09zDJ9Eyw8e41lH2aPxVQLF7xLBbl6VdAWYLhxGYpCOV2z1RMZOVPoeNgnfPO17glXeXJfUYqu++UrSdHk0feQIqfFMsjVMRA3Jke9yTsPHmJWsy1CcdoPyB8nu6YgQPXwuTFgND5Mnc1bymieBb5zznyQb9biXwORxscjttPp2PobC85RO24uX/bT2SzuBYxc+xH5af/e87Nt7/T/EWGW89BA5Vj3k3Yz4wojFU+l2ik7jYQI1yZEDOYsndHMTkZc4vy/y0h3ZH3m/VH3s5DAjfclNEqHmsv/NB9pqPk9KMDI+GjDz0TebL7fMzPu3ki8xwMzbf0vqLrW6t2LT9jIMAB4qr5iGL4xaSU9lfXgUwCz4PgAmbEo+oj3orcRD+xCMh1z+kHX+QwaiCQDVHb0ZaKxmSHa1Cf0H4P05CNNfRj/9O+hpdjQ8L4Vmzs2Ih7aj9kjw3eXIadxPwBPmJ/KWKz52J5BzXEii7NEYzgpNKqMNEO5HpHBcBhFGtdG+aEv7XQbedzrL93waHzvte8sei42fj3//y2uPRvvS0aI3h2azVp2vvPHQybcutj1vmd7Q6fO1mm9tYmrV3S1PDhfLs7kj5z3UR8/8UD3roVmo54595Vs57ThzsXrJw5Xb7VrhYAYuX7cjfcB0eSJ4Hng+/NxUVTpt5297coKT4trF5Th7WV59n6DxwjfX7ccbnXW/1IeKV2Lr9tJS598ejd6dX/1/QvuPqltLHV8Od5eWElKoP3n/m4fbj+q9pTWfxoPbv3586bui+KgeL732j81SJfN4/nd4X/n4+MQY4JUH6nRex8Euufn11vWqTeO/yaYHL5THdp7JixedcPNm/GvfeWznwVvHI/9NNu4cv9EkTnBQ1J/EAS97f+In5OMT4wDZLP7eguMyiHam3r4MOeb/X35rbrK1iHHQyxffmptUb8Zh56cv3cQi40iIEMJroefPFlmEc5POE1OFy39P7WzJcJACqN0KPS999fSjMW98Zyn4/Oml7yy9kqXA89VL+RG08+VLO29cr9Zuhp5vxW+ycTMg8PGJ0XupDkqwIxGJZmLN5HRsIceg0EyimVgziWYixeZbA1GzxgW62lLo0b1A55lNYp8zDjfJjuCHHQAcAAR2AEQ3ITK4afOAQgeRgQIcBK4slZSuc2os+8OPyrJfZ0e1ASAkTUWSBapdLu5Vy4GH6q3N7Hcks3fBbnem+ynwvKpcftjHbf6pkHzpv+9qcfhLq3cpt80/FdJ8Gw8IZfcFNg98PtjcyHmS05bx7Kn3aVDgq7kipJwYINLocnajPigwMjyXtUvyggHQu13jVTwwlIX9haSJSZ4vsZlPg7WjE6l3KoMDcW5P1rOnTM13XtYGCrI2ZzoJra7EAwTRZLaT0IwX6JbagwRfNgpJE5M4X5nWq+V4oChbxe1br14dLOjOzamsV2WzOwAyD5xaHSyIWwU+P8jmxjdP2der5XjA4APUEicGIM1x0aeDzKN3Y9Cg9f5GhvVqpgt0Rw8NGsQvGwxikIAo86P73+8YOFhr+icmYb6yMTZw0HuUgUxdzg4exPe8E+Obr8wnoWdLAwgZTkIzPDs0mLCS8tmhzMwPHpVP65lAFIf1fcYg85gfG1R25PrJz2LftGWhNHjQzIZ8BF0K8O0Gkh2tbfonJmG+Mn0BeX7HAELKLyArVAap5kzL/gGEV03vxCTPV4YwdSY/YACVKFPIsF6FyScDBo3PP2zPehXPvBs0Vv09yBSyfFdxMR44oEzfVcywXsWBg/76h0zr1SyPYF0dQM6eMjyClY3yALJezUTifV4gz3YDCE3/xCTO1wAFVCgTWdarNw0NEhSG+1tnU65Xs38fZ1fnJXkKhnkqV4dx6vz0TPLEAKRYtxIJDWJK5HR2lyYmWZmYmJw71A7xLcif26rbfpQnN2euC5syQllx06byS33MAOn4gQA/dPXH386qa/1SHwA7EqJoRtbMdIwxXNKpxN+sVlZdqaxWKm47LuFph8ZJv9rjJIMjWH5lwF+FKu75TdQGiKGc45gzGlIrk5v+yo2+IASaLcsObX/2i/+FVQdgE+IMkDWjaEbkzSIg+j5jnIkQQd/roNtsNF1pNBsNtx2X8LRD46S/73GSwREsfzfg30MV9/wzagPEUM5xzBkNqZXJTf/uRl8QAs2WZYe2//0nl903+mI+EFN8FmPqzUQg/+vAABCzNETMhMAwna5lOKCrrUJFFbDU9nL7ClVSP1bkceKt4nLOSjh3NIwrVKrcdPDL8FzMNUzagsrWKS1PnVbDprQNm/ksREnyQC27k0pHdGBdjrd0H1cKlS87nHS60G3XZg7yv50AkZglEDETQqbNCVih4LAKiipgqe1ye4UqqR8r8jjxVrGcUwnnjoaxQiXlpoMv4hEoqmgLKluntDw6rQZLyR2ASfMUWIpMZ1AEAVZQOCBeHwAA0H4AnQEqRwEYAT5hLpRHJCIiIaRQqrCADAlnbvx8mMDEozLlZd23sblZGJts/8D1W7eXzF/t56v3+l9WfoAf2T/R9bT6JfSu/vB6VWqWzJeKv4D8sfP/xceefdX92vg2zl9ouo78w+7X4781vZb/keH/yO1CPzL+n/7XxAdqpb/0Bfez6Z/zf8R4y/+z6O/pH+P/0n3IfYF/KP5t/n/zS/f/6M/y//R8qP6R/v/YF/l39M/0P9v/yP/f/xfyJf+H+X/MD3W/UX/Y/y3wE/zT+o/7f/B/k/87fr3/dH2Kv1Q+/8ifH/ZI9mgz9OkEm5TWCG96ezczWsQOy3vj9J4A+YdypGt++bJXe1XlW97eKTGDVEX0/47bnZ5mXIg+HNXhVOBEnkciCB+BtvTepSwCzhAE8zWqQr2+qaWjmYLM3LHINc9m4H6SlUcy6oEVN+e0xrEDtudnmZRd1lLnxybaapBSsdC6BQYBicZKot6lYgdtzs8vxvzfYdiWGWF4BlX6p49urrxDJ55q9dRCAp7NzNanjje/LpcqGuWxsw/wrOMEVlddXF3Wdudnma1hFRkERe1Mq7Tnh3w5QSQpF52ZT2+qHoCzhAE8zLJx12shBbw8AeNuFheCXigwqkX1o9/7PM1rEDsosbUvOtmDxD1Xo/KGt9Ta3tmlnCQ4QBPLuqq1Sbom88mRRXzKlpvO37MFh40uPHnw7PM1rEDZ0sh1STX3K6qwb22Va/AzH902RW413uPG7LHL3PsbbnZ5d2mn7DsDJmZh+cyUWiEVXN6YrrZ5ssXys7iLUE7oHjudeQM/VG2kQUVyKolfS5OXCpVeowKjAIaFFTFcLQISpyfSfXsA7rO2+pIflTJd2Y4PsGrQu3kwf+znyLAQbHtCRI0zX6LmBPcWQPT8BE7JCTOjkf3C2ZQZ/g9f7EjhahUg8OHwxRlBwuJ7hLWD2yMvZktgg2tJtrUtCdk9uyLXA6QqtSrCggzS390govNXcAfBHxfL0GMFXKI5y8Nr0MufifbFoVl0YFqrZSFR8u4NFX2wv0O2Br55j6DL0qbNiGOl/Po7A8xyzJim/rpRc03le9DN8F/xdS+i8hxiEi2VTDbDOo9SLJzyvYFJLi5HW8CR4HQzOrYe4Clatzf7+hElv/WvGkRZLUhlzqW4QK9+0tJQO5iOtTTStfwxOEoyA1CXsJq3lWcFjHDdjLtiXlVC+HjEdKkt91Vw+IIYNf3C9esOdwqZrUHd+kuACjHiRcyjruff9AaUyyM1Lv129wAZTMdvBF9qPgz3lGYx67FfmbsoRCxNWUsFwcyZWLY5gHDwTSn6aQjAJ3rxkxPCKOb1AeP7JY86kRl3QvnxN8RxdaoAAP7/e8l0Nkuy/HvvbP1U6wfC98DoUNJz75moSCln0GAPD4cMIkWTKPfIL2biDXjBRS+rkAfHNS5/eP4BO8C09XnH+3PCXwL7tnrEBY3ojrthXejeRW9ufIVbmIDvQVi2FEIkug+cm2ZDINIU9jtm/cYeDqXIRYBEKEo+vmclF0L7HwrKRiUvJX1zQuFwDo/0lyPFCfR84/WTDdrCBRZY9b+HKonyfilcCVJTdZvWizPqgNi3fhV67D5jPJMvN7RDlrUrOaIG92WkpBPVZdJ+T72CnxBO4VfpAGZGd4NLXtixq9piSZxD+MAoTyOgMe+4iFhoIx+38yBpBMQ6wI30VREbGyxFOps6OfIfVLBZnYsxY07amzvNWLz6YL/f4CNYETif/zV1SCtl3+JMue/fw751k7xFC9pJZ0CKdgz4qI6avEt1riyTV0tKVncKWmedhNjXyD1C67V7EsKyURfkW5qhe0p/T+Lf8ErOoFfEo9mCPGaqvj+tNgYISjASt1sPuPbxfySdn2MNC9bXntrggu1QX2AL8CeJtD0/H0HfcmOsnKlMwoerYksrCWozpcRsWG0AwWO5bFByYY7ynADMw1zw5tWeUTXxrW9Hl9R5GcwvEVNkg+fN/hsMjzA5v6lwQeL16cg2bpQv0lThAWgJJgZol1HHPhDn+/PI0Cs7mU6xC3sC8+8DgtOySXEiKKvC5tj5kLFuCwrokgXpPFQ7zA42PCNSjIVqT5yVy1sQ+90WfNw08Mg1axGVFX/Rw3TGujQS6SaqQzLGDHY0pIHL62ZL4dNpy9fSvuvSfxyyOP3bcdlJMHUPlqSjrzp1B6JbzurSxmAlOe0GEjm9HeAsIX8UbIOkilW0aGUMsRga6tF41SuZhdcUSCTyS11gFNCPdL3ye+Gqgh7MCsxdvttzydSwb9TuRYsvZZ2vPbNYuYg93zZ3WlsXT+o6VrgG7iQ+A/h0zBkvKVz7YtQ4WLTa3Yc3teYcnXwSuX/IIXoJNrH/qEWFT6Ki5otnN6kRIFYIG/aRyiCC/jSBdHro0AtHOf4HI4/bhrAdA7MjKpqXS+cAU2cZGkjSfWOJyckaeXE6fMVeUK5Q8O88APhxm+zp3xM/OllDnO/l/Wq3Wx7FcQG1fR0dyHVY6/EfgwkhEwtHPhamtJ4u+HLtGFgUqe/3C6kJ/hmMdV4rrDPejQYL9b9Tkitg3nOBaU8ApoXNMbfYWqC69jDtdG7HgUC3G8hEGk1BxIpTr1juPeN4ihU0qdHPuaXkzZBYl8os3j9Dx+jI/gTHXcXU9ynisFKzDyEgMsRzyb6Qm+eMhV+trqHoZsXeUfeBiCGbXy44xqqUIgI5RKP74ZcOaih+b44uzpP1q/SgFz1lOqJOFLm3TMrZSVu5gBY5v+2pjUFYT/vu7CiOmCneEWNJGdlNmv3c4HRBfappFXMwAuRHva6sNygVV/bve1zFDeJ/qjB03kQYMAErafT2/pypP+Jo8edRubNDVKa20o1qYtVkn/Rb7gmYX9/SBO7LGn+l+zyNPGzQzrrtUuIZ5nWUnrSi4jty7D+RD1tIKP4aic05fLz1aDA6B1wAtZh6tCu+v8qew0ImROerh6JoAB+ywcjBSaAxoNRBxbu8pHW/fxezcrD8YhuPMaazAJdz2OKwHTrv6VP+CTm5If1dWg6yRk2v7IGClqmnHnJshsZy3k+hdElBB9hJGu/k1bfNp8W6V2/UlCn858eMHYXiNpHKEPgKXems53Ii19ana2tl3mjxKo644IDEBIln36WuJPdgy5qDec5oXw0/LKhn9dUBXWOTupqGPeHvhd4swdoflkBWScIUPh6x69a/ujFnzy2cOIT0LRcV6vCrf9lKb3saB/V21bzFLLaPnCBnifrgv9wNbfjvK0BnrMiZ7G4dHFsjMB94VLs9IR63ap5+tdtzV5s9eFtopqNsB6FdNBFgxWOCMWBNLz2ozl1Nv3T1ME9VoJMrMbrNEwqYT4QBaGvwcVE6ZRVUyZALoqgeDZhYexHDwvrS5JFPAXuo/gB1AqQBgtzP4Lm5rv8nRyfLi7SixsR1vwrJ9SXdd62LxVF4itghcVEjeuz/DvUAro+WIv1IaC5wGM0QzHRxxatbHEkP8IvHuFoPypDeRpMq36RsC+p6vAUWzb3Mh/Snd5odzgTE/5L4al3EJUBqmDIhaULZcZUR24n/DiZt+LEU5TgXf3o7/nRaqW8cO7kRi/tdkyTWzHdwDuvQnVLd9h59hZ+RoR78/xdjegALghSIdCuTuxNIHXX2Z4ZRZw58s5z472FGVAzHD6KozsJ4Ajgz2EFkjFRIXKd/o6zfAGv9TY2WpopnQI4LQv3pHBPCoQjsuruV0eaIyM9os6O20QNS4gRXc2TEgaPyIVWM7vMZ8/qDglWd5/SXv6tYxKWLWMfDOFJZktLWLgIUJ8tKEgTsrEPFgY93lQ2C4vxzzjItqsCfi0Ha5mzTx7yd8D+35XVKhVsr0OlEBVw08ZJTk/CFdI5VF+B18DNaz4xmVWxhBDsamsWwiueTRglkXAkNeILOvaklxEDpgkP7WnOR1gcsgB/md5lhTvgDfD1pgVwgHDyNW7lp3eRCcQ1lG9Nja3Z2qwujZ2JADmfzBXcg+tq0G0lJ4Qkc7altd799Ox1kPO37HMSx0wFeZu+vG4g47IkYYcbcc94Ez0/C2Jwe3vo6ano25ytVdvh9ZA/nvki83sM8hm8wGzCjry4xBaMsMKQusQ3eJ93YAnnTIAyyCuqVVDm/wL+WfC7AzmU0khFSqPlAXjqFGMSx0sJRnKV2pSXUr+GaaG4RFy0Ti2zutS6/LMqVpP3YVBswaw4u2HpDINVm49JD830ZB9QAJ8dHXTE/vLqJKpxoxBehNhkLCuqwnMs3gNdhAB4FrB0vnejfjkQcXyrK1HtFfdLfcysJnZizAvLrlHoU3YbXYwadPqeNTNy5xqzDwYGEwgBAM+e50s3+8FT2lS7qrQjM/QmYsXf6whZQnfIPNUpA1h//qORi/EoSsl0kqVQVrh2l5bxRDsSxTdJqnRnjqa7JbvHUXky0Qbzl/z/0Gok4lJH/AF6ggXdNLGC9oYuv3BVWq0wX/8GcXHEEsubsCL4Y7GjuHEUscl7ejMIPJj1J2EdwX+QBWDFRhnzcCL0+zbcTqe1Si0gWj3Z053NFC4iRqrYxpD/3BUz+XHwyy0dAoitnXU0f2jDtGdqGMTJNFm/6JAVBHVNErGu2AE6GhyBPKww/jTk6RfMOreVoqINTKGJyV5DYiHRjnKCx89EdHGoc3UjPbPaT35WDiMz2BC1HfEaZPTVaYBy+nsXpV8Iq9Z3HB/Yrod7+r4Ff4jMfeJ/CyZbAi+H9la5nkr3S+nkWse0zew0ZWT6B63k4ifOHC2M46S/MHXGf99rSay+cJ4XVUWSbIgNfT9H4bwYVScE6WBSSMJA433jX8dMj9ufi1DY8LR/KMRh/N55ufWYAXnbIDP6Nz8TEmb8q66ejRj5gqkOpGq0GS96JjMBW6xphcfiqaNbB+rP8AI2rqzVEoaOf/S+EPlm7hVNnk7+V2nrcJzJkRhQSO0EqAHBL2EvwoFCYIeACb/qA4tYTdM4mniFldor7xPsiZM+z8d4RvJDbWKoYY/eX9Ag8n8Skv9Lvw+bgsjbaeXw5tiHFVGjelZbpsWW1PlRgQiUd+iM940gWFAOHIpgQ/NxpHBMjinYBD2NKguuqSyCC2PfdwOK8bNCdUL/MXpxfcIB49T4d4WNuy+d2964tLf+S8HNs2klHqvMhFNPPG/NQLBoqv6KVZ2LS0NezjOJTaLuFCzbDAuipnmEcWdzRZ70W0wzS4INvf6qkQItmZCDJvoRrzkvU4Jv9Pv2wE4p/LoFSG8RK6Io7iXzaeZM8nfx3+KmoMZCok8HG2o5Z51DPY8Q5OA1p9mlPHIDyD9OkK+zE04j+PDL6CxLYY9vMHZ3nvgeIr95wYWKb/mWkUpJQflASKqtCYEb2jas3uEx38Gc2wqy+5umfXTHD7IJkBVsX0kovyj2s3Y9G+XIEmjVsAh7K08EX0PzRlPcWMXjPLRzfWDY6AqfbkRT7UACxxGbq/TU9mJYnbvkf9jGpDyE7nIKdX777nvCfVEVfc7yYw3q6v3trdq4m+0Nf6lrZmo3ECBIWGC0ienfj9D0mkpD/XKYADpz7FwmVeTnGXQLCiQ7/EEiFOTz4j6sRm/dLpkwsIppgwmv3lONfsTfzhBPbu92cI6QFb7ltFvu3O4xAoHZwweyK0LUEKqSBufThwQpBEKDevWfC0ca45ihJGCoHDH3JtOnNBs6XuKoihDLV9vD8gr4diUdeWPxhssvjrat+GjSvod0xQlAokw+WEDFMJTMFsLYV7Ps65b9FqLY9+5sDh6GlE4AnwG6ks8CRiobbReVO+ad+/oAMru1e29eqvT5AsI1hriPbfeIJzlq924k2Ee1vJV2d8dcVSIUAsObEE/gjOJGZKGYGv0j7+zYAfqhuxJqas6DJqb/Aiczo2zqnE8qRtS500mVQT9TOB+LKOJobJPO+RBj6j3/Tcr9IE1v3moYehqeAXMLJEqY5i0/nDQMrpMxKoxoqGY0efdhIsgB6Gr+GjtZ9IePS7mEaC7LJCLh2Mikgo7bKa8ESOLrxNpJHsux549Cy/OVf6BaUS2eaIHmYp2cEtWHcXOXJTlewDG19ud+ZRmsQsGmhOVQ3BOITl0LQUlFBMIYeSUNlXq2k629bgmAR/mRb8ientxIJmSCh8tg5eJ+XwmWtz6AQvIjW6EeGSaRjayFoWGpJbEcHiP/uceiy9GORsdRlua8O5n+r/4nWUJkYnK5SrD1D98yKIrNM1PNb9PSBv5NAUus+NJRWynGDzIKKs+TqFu3jgUSul4NaDVirdMc7XkhjjtCtV387r2f3z2f3RegFeJXAHe6IFhfBl1CoX5WewQEvaLgxdS8IgdXow2NC+e9hE3NV/8Hbisd+jFdDpETMB3PBOfi9q4du28ZVjmYCnroAEAaIsTbn5sJpKpQacfNy1sl6QXV+4JU036x7RzxB/4x7ub07C1xGGidtX+fPsbPWrw643Of7fVkHmJH6M87kV5L/x5M+Df42Iy5YnSrN1LhJtXgV/kGZv1Jl573PwAHHjDmqrKXf3M5WxnCqn33mpen/fcdTJlLOeGKX6hItJ2ktwZ7DtVLiJxHPB6bMk3aK9ivs7dUzlVuqcjpKjdkPQBebfcrQPGngbb7EehCbfJDxpUEwElI5Yx50tWKx0UkQSsCozcnho0gZtov4xRZPqPJHobOw2keTQo+ry3VQxud3fPqyxoizjOnOnADCa0+kBBFVhKpObQFbcD4iDBAgEc8CIDpvj+Uj5GyTphjsYlBBzbNgdMWiijzgDTmdZuOCJ0+ripT0/2zK8HpvbcVAUu7Vr1lI6MmkIaBe9jddoiCq8+tMKS2Pw9ZwbLLgZv01lbQXkd6u8fgSWLoLU6aQ4pctnQY+8tvJv2vRfkaattOVK6wAsWlbU58YHW+fDRWTEYUJEow1zTPQOVdAcEWUMRkBs8IZ3bK2fRFxxS5V7ZOFD2/bu68Rx+bqOxpqYQSd6h5sUqu08teVopRPjjYcC88n5FN9qskewZfwNt0EJzMMGFskEPI/5b/PjGB3szYgZcM0e36RnQc8SA0QgEKQ7gFwPmhDPSc7h9UAYE+si05F/alqOR7kuam1EVkqn25FENWyDX9hdTBuwkWcn5do8F7UWRhC+yt2nAMPaRyT/dMAv8xghpq/RCZN8tu8V4Aud0NrhWEy8VgdbVdvFgQ0/7jUORDN3R43ILffy8aDNJxVGBpuIqvvN7rOhjZachRoO7iO2XljXKyV0FjPI8+eF3HVKCbmkcI7I2aQydLI4L/pq9vWlmx8IpE9z07ec4pOgLCfb1+z0Q0dU1xeAy+Cb3/7NUdqIZsJm0OM2XkY3jysFMTlqcJUSKPe8FLWpxdWcHuxtNPVsgW8GP00AZK+gGV5fVnbCYYT/LGF+mTwbffLbRP7X6VW1DSB1MzMMHQZ0fTvb7UJVTWpQy3a+PLbpzeWyYmIethr3eZ3svXeF5Ksk3cjSo2jF4J2mv0QboP3V5U8lUXfeHjupcIT3xaJ2c0vpITY5L8ZHfm/Ou8PPUQyOzgB5/PiG3dBQDB5GhO8EoGuUpknEUUdlIgEkpVqDGFaUmzHDXsqtK4Pja/c2cT7oIkfN9ezrGU5UjgTzg4KdV8UG3Okmsug5M8w2jcLeyeh8ZyLyUVJfCtLVH070C4i14r8jIeEgLHMhe3AkQCwg2uHFEIB4+ke8ZV4ssj3Vg+QBq37r4fAliMLML2pu0lDxPYpQDO8wKcTgh1ikgEMWFl36X3DhS+E4pqnsWsYbxNzUwzENcoCzs4URLX19XxkLuF0J1uc7aRI4+NHoPb0Ua/+znQ8HjRXeAj7v7DvR0YkKq6J0+RLP6tmGw7VlTSh6go7b9BnxYgL7KVef4b/meG3I4wJkSwwv3m4ff+2HiWjS6u7+uUIviLku6TQWjyDgFkhDZtAQi23kPHhR/aRL1anCBrMTOoPxGcS+W2QoUVA+CvwAZs/ezqLXYibl/I+9giUP72ezSeyEkiPxwOno0C/znQ2Kqk4sdbjyBwA00bryL52PV3sBR9mxlKx/Im7IXHHPqL5f5rM2oi2PbFx7KfBGx0Hml3EkM/8QzzH8jGVgaGObSSFShhf0/LxSnt93IrvM/YApKuxVAud0WHnL+OwmMXBo8b1znnWT7gXSWCTHoMBWvriBDjF24hgir2cm5QaHugiZJdn+DcAtzzXlx4fxNgONuZFH01rC3DiOv0jaO8if9Y699ZOjRtWBAVP/j/yddwPlBThSn0v28rNHIHRnuUYeWOaeag3yxhrGf8cfrOpBvcoLlyzI8bXkhETdNVWJOW/UsPyzO44hXl/LYB/gasuwnDoe+tAbfNiErEbP2uoVyyqqrPAfTpdGeBwZhg7I3EfnXtR1Ff2jZbQCIkhBnw/Z116R46YP4Q210G/FLF8fxB2CyM0eIzWn3UFtTISYvRIUH7T4laI6SllVev3fWm6hSlvAVgqGGTYkug0KbFKS/SNOm5yS3oMkXnTAIrkt4fRBS8dqGbzzTcJzH7wewDi6yk1iJMEwUaVGK7NQgA3FUgXQ0D3snLGVkslvoL7gR8Hok4SzVisZafnRGawV1IUCmeSfkyqV6t8LU2Wx/Vv0KmnnAy3AKdoyLqSjbR6wQykrT7ePfG9eHKFdHFPoTbrMtkdmby1MViKdETDCHEvPuijkLfKd7s5+i4hOMhukygR5kw5W2M3KGwfF30NASOwGZdxMK2NU7vvjxH/4pszecxUaE8yUPnU4WOX/jiRttzNxVR5lFaS7/xexxg5Cg/jHaeuPAOC2fUWtLm7iCWE7kSMOwNEi3vY7glccwH7q8iknWOIV2bUBqo3nZRDEn9UcC+RvUDIFub9aQubgB7rHXL8B3wZyYbSi+yEAIsYEWv2U4cItQlFMV4xADHbheh2rya3qHVSRk/Ds0xvW07USR8E8o5u/MGgzkqnvW7ZljAKXdh1xRZceM9TcFEdRlSLogQyBa0+ImXQx6MuykS3y5vGKuROyFgWPSSANyGYFSJbe4So3XY8vgi7/aiXjXmsSSVQ0Kqc0IP3pNWkU84BxSki0Zg4XuSZobUmzzARd0wNoovHZ+hyM9+au5cfg/UBvYSvZmgwfO/UxLFMZny8A7yXySqZy040jITpYiPfx7zNfwDmil0tGz+PT/MbuwqnGM961im+/e1e4FwEn4ee3cIvPPvsHRM0ZL/1gDNyoFHAakjuWPzMFLrjsnJcuABw+ZDBue931xPxfWV9vhmsKK5rNhsVwJ377PbM0Q2eNR2hfvnvWWaLnbxYJ0jpeYjfwk3C/7t2pUtitoL/C8R0ia+UREuKRtGLpfEHZO+tsAZN0vUlcTBL8krRFgi/R98iN5ZTQ7cVmjIFY5yIOZgDK9CE17CCcgWykJCTAIAkX+4irT65dSaVjI7ADZylw8Lvi2ofxVmT1xdoSU0F3sq37vAYsEq8aQer8BbgylFY81NNWiANKlRTqPyLA4fI+4DfgrCCbCwM39owQtfk/V9phFLllKGAMyz3eU0ZLIUPZxiQ8d4YfiE1n/UzJTcBfr8IGKfNcx9tVbTx3EVsCYBbTK5xjKlrrAcUEwhxbJ9ebZi13PEoVWC/aK+Otqcgl58WnnDItwxTcPgY4bSfv3VpTDzL0La1Mf9K9ubxhhgS4JvdyRvCQN2nPUWyi1jAJjCtLM7NbYca/+rgDYWK5thPdOdZoDuEmOztrz9oWzbGbrWntXmX+yP2S1eW38NFUH4wH4BmdbMjziRX4qBTxDXd4+2M0IIoQRrb8GLr4nofkF/MvNG6yR87vNEjqmJ9RvdnacnPHS2UWSA5X4kS5vAW6MjGynhvXkxj8IWmxWajHbxvLtKcKEgofXOI0KeSOZj6NCNZg7Hi4TGSwnMAYgqTXcseqN0H6hRHjdRIwhNHgyATi6cVAT5OHhlCwtKcnZtJJl6yygOt4sT6rGCKLl6oXlNQ+/sIkZhKWBDKlSvapfWQ8hBZiG08D03FowivKlOCXZM2U17PNyrQxQfjfkjwvdUFZw4ipZC5lN1ivTZ9eZysk7eCKM1PrFJDbarLZdIcgV4OwNxbqmZkWI8c1TAdUMNkaHjkG3wlOcCgBu/iVfDWbS/pDmC4L2NgB7vB2r81zJmO07xQEQcrlicz7l38SXb5ex+YtKHfQwrE97EpLyAG8mV0MdXyZ4SV1dN8ifi1Fu2w8hpmy8tO1+vZcjS4k1LN/USXtStX/eN8FU2uTVjPFAvN18R9Yl4Y7J+Qdnd8ON6dOCP4a/GAoVQNGCjYG2k7ZLgNPzvqlRKCLpUyNSPsKemehrf1+PHKA+kUwztgaFnBHzuSNe4DFRuEycpLbERnTFmuYIw+lIy015ak7LSd5zaaMHwfhXCrMCE05L882xxGh3ZbKaiWngHHoZNqAb/U675l0S/lY7fcG8RkWs3HQ9Q5BT0GTMrPAv5IKF+gV1B78FAOPQyWRe6PwNpRR+eyd/cPpiKdmvkwKYQIdaQhAj2BbpbES4kLQpLyta37GKj+UC+ssE9BS6flAgje6syjLFGaBqWLxKdrasg1EqXcC9hBEI9LmVHJ2bJkE6BygsgG5hUKJK7VQgICUc9RxkVKA/0KnfcqAT3DINxuc3vKTZAIQUEYOBFAm1YsR/lZd/JRsddB51bwntCyNIbTJlFp0YS84W2Y80GMfBWjDejZjTuC2qpHcP/UCqKANm3X0OVxXHQlahfehesEbgeNM+vaTFtHwWXoY+1QAAAAAAA=',
        'd-link' => 'data:image/webp;base64,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',
    ];
@endphp

<section class="tawa-cover-hero">
    <div class="container tawa-cover-inner">
        <div class="tawa-cover-copy">
            <span class="tawa-cover-eyebrow">{{ optional($heroSlide)->h4_title ?? 'Networking Equipment Supplier' }}</span>
            <h1 class="tawa-cover-title">{{ optional($heroSlide)->h2_title ?? 'Networking Equipment in Kenya' }}</h1>
            <p class="tawa-cover-sub">{{ optional($heroSlide)->h1_title ?? 'Routers, Switches, Access Points & Fibre' }}</p>
            <p class="tawa-cover-desc">{{ optional($heroSlide)->description ?? 'Shop routers, switches, wireless access points, fibre optic equipment, structured cabling and CCTV products from leading networking brands.' }}</p>
            <form class="tawa-cover-search" action="{{ url('shop') }}" method="get" role="search">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search product, model or brand..." aria-label="Search products" required>
                <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
            </form>
            <div class="tawa-cover-actions">
                <a class="btn tawa-btn-dark btn-lg rounded-pill px-4" href="{{ optional($heroSlide)->button_url ?? url('shop') }}">{{ optional($heroSlide)->button_text ?? 'Shop Networking Equipment' }}</a>
                <a class="tawa-cover-link" href="{{ route('brands.index') }}">Browse Brands <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="tawa-cover-stage">
            @foreach($heroItems as $item)
                <a href="{{ route('product_details', $item['product']->slug) }}"
                   class="tawa-cover-item {{ $item['brand']->slug === 'ubiquiti' ? 'is-featured' : '' }}"
                   title="{{ $item['brand']->name }} — {{ $item['product']->name }}">
                    <img src="{{ $heroCutouts[$item['brand']->slug] ?? $item['image'] }}"
                         onerror="this.onerror=null;this.src='{{ $item['product']->image_src }}';"
                         alt="{{ $item['product']->name }}" loading="lazy" decoding="async">
                </a>
            @endforeach
        </div>
    </div>
</section>


<section class="tawa-brand-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-2">Shop by Brand</h2>
            <p class="text-muted mb-0">Genuine networking equipment from the brands Kenyan installers trust.</p>
        </div>
        <div class="tawa-brand-grid">
            @foreach($brands as $brand)
            <a href="{{ route('brand.show', $brand->slug) }}" class="tawa-brand-tile">
                <div class="tawa-brand-tile-img">
                    <img src="{{ $brand->image_src }}" alt="{{ $brand->name }}" loading="lazy" decoding="async">
                </div>
                <span class="tawa-brand-tile-name">{{ $brand->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>



        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="container">
                <div class="tab-header d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">{{ get_option('products_section_title', 'Featured Networking Equipment') }}</h2>
                    <a href="{{ url('shop') }}" class="view-more d-none d-md-flex">View More<i class="fi-rs-angle-double-small-right"></i></a>
                </div>

                <div class="row product-grid-4">
                    @foreach($products as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        @include('partials.product-card', ['cardProduct' => $ad])
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-3">
                    <a href="/shop" class="btn btn-dark btn-lg rounded-pill px-4">View All Products</a>
                </div>
            </div>
        </section>

        {{-- Brand sections --}}
        @if($mikrotikProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">MikroTik Products</h2>
                    <a href="{{ route('brand.show', 'mikrotik') }}" class="btn btn-sm btn-outline-primary rounded-pill">View MikroTik</a>
                </div>
                <div class="row">
                    @foreach($mikrotikProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($ubiquitiProducts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Ubiquiti Networking Products</h2>
                    <a href="{{ route('brand.show', 'ubiquiti') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Ubiquiti</a>
                </div>
                <div class="row">
                    @foreach($ubiquitiProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($tpLinkProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">TP-Link Products</h2>
                    <a href="{{ route('brand.show', 'tp-link') }}" class="btn btn-sm btn-outline-primary rounded-pill">View TP-Link</a>
                </div>
                <div class="row">
                    @foreach($tpLinkProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- Category sections --}}
        @if($switchProducts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Network Switches</h2>
                    <a href="{{ route('view_product_sub_category', ['category' => 'wireless-devices', 'subcategory' => 'network-switches']) }}" class="btn btn-sm btn-outline-primary rounded-pill">View Switches</a>
                </div>
                <div class="row">
                    @foreach($switchProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($fibreProducts->count() > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Fibre Optic Equipment</h2>
                    <a href="{{ route('view_product_category', 'fibre-optic-solutions') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Fibre</a>
                </div>
                <div class="row">
                    @foreach($fibreProducts as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">@include('partials.product-card', ['cardProduct' => $ad])</div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        {{-- Latest articles --}}
        @if($latestPosts->count() > 0)
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 fs-3">Latest Networking Articles</h2>
                    <a href="{{ route('blogs') }}" class="btn btn-sm btn-outline-primary rounded-pill">View Blog</a>
                </div>
                <div class="row g-4">
                    @foreach($latestPosts as $post)
                    <div class="col-md-4">
                        <a href="{{ url('/'.$post->slug) }}" class="text-decoration-none text-dark">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <h3 class="fs-6 mb-2">{{ $post->title }}</h3>
                                    <p class="text-muted small mb-0">{{ Str::limit(strip_tags($post->meta_description ?: $post->description), 110) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif





<!-- Services Section -->

@if($medias2->count()>0)
<section class="bg-light py-5" id="medias">
    <div class="container">
  

        <!-- Carousel -->
        <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($medias2->chunk(4) as $key => $mediaChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($mediaChunk as $media)
                                <div class="col-md-3">
                                    <div class="media-card2" data-bs-toggle="modal" data-bs-target="#imageModal1" onclick="showImagea('{{ $media->file_path }}')">
                                        <img class="d-block w-100" src="{{ $media->file_path }}" alt="Installation">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endif
<!-- Modal -->
<div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Full View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage2" src="" alt="Full View" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<!-- JavaScript -->
<script>
    function showImagea(imagePath) {
        const modalImage = document.getElementById('modalImage2');
        modalImage.src = imagePath;
    }
</script>

<section class="py-5 bg-light" id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">What Our Clients Say</h2>

        <!-- Testimonials Carousel -->
        <div id="testimonialsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($testimonials->chunk(3) as $key => $testimonialChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($testimonialChunk as $testimonial)
                                <div class="col-md-4">
                                    <div class="card shadow-sm border-light h-100 rounded-lg p-3">
                                        <div class="card-body text-center">
                                            <blockquote class="blockquote mb-0">
                                                <p class="font-italic">"{{ $testimonial->description }}"</p>
                                                <footer class="blockquote-footer mt-3">{{ $testimonial->name }}</footer>
                                            </blockquote>
                                            <p class="text-warning mt-2">⭐⭐⭐⭐⭐</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>



<!-- Store Information Section -->
<section class="bg-light py-8 pt-0" id="store">
    <div class="container-lg">
        <div class="row flex-center">
            <div class="col-sm-12 col-md-12 text-center">
                <h2 class="text-dark mb-4">{{ get_option('why_choose_title', 'Why Choose Pepasa Stationers?') }}</h2>
                <p class="text-dark mb-4">
                    {{ get_option('why_choose_description', 'At Pepasa Stationers, we offer a wide range of high-quality stationery products for individuals, businesses, and educational institutions.') }}
                </p>
            </div>
        </div>
    </div>
</section>




@if($medias->count()>0)
<!-- Services Section -->
<section class="bg-light py-5" id="medias">
    <div class="container">
        <h2 class="text-center mb-5">Our Recent Installations</h2>

        <!-- Carousel -->
        <div id="mediaCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach($medias->chunk(4) as $key => $mediaChunk)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <div class="row">
                            @foreach($mediaChunk as $media)
                                <div class="col-md-3">
                                    <div class="media-card" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('{{ $media->file_path }}')">
                                        <img class="d-block w-100" src="{{ $media->file_path }}" alt="Installation">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#mediaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mediaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
@endif

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Full View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Full View" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- CSS for hover and enlarge effect -->
<style>
    .media-card {
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .media-card img {
        transition: transform 0.3s ease;
        object-fit: cover;
        height: 500px;
    }

        .media-card2 img {
        transition: transform 0.3s ease;
        object-fit: cover;
        height: 300px;
    }

    .media-card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .media-card:hover img {
        transform: scale(1.1);
    }
</style>

<!-- JavaScript -->
<script>
    function showImage(imagePath) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imagePath;
    }
</script>







<!-- Services Section -->
<section class="bg-light py-5" id="services">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>
        <div class="row">

@foreach($services as $service)

            <!-- Networking Service -->
            <div class="col-sm-6 col-md-4 mb-4">
                <div class="card shadow-sm border-light text-center h-100 rounded-lg">
                    <div class="card-body">
                        <h4 class="card-title text-dark">{{ $service->name }}</h4>
                        <p class="card-text">{!! $service->meta_description !!}</p>


                          <a href="{{ route('service_single', ['slug' =>$service->slug ?? '0' ]) }}">View more</a>


                    </div>
                </div>
            </div>



            @endforeach

  
        </div>
    </div>
</section>

<!-- Homepage Description Section -->
<section class="py-5" id="homepage-description">
    <div class="container">
       {!! get_option('homepage_description') !!}
    </div>
</section>

<style type="text/css">
    #homepage-description {
    overflow: hidden; /* Prevent content from overflowing the container */
    word-wrap: break-word; /* Handle long words or links */
    max-width: 100%; /* Ensure content does not exceed the container width */
    padding: 1rem; /* Add padding for better readability */
    box-sizing: border-box; /* Include padding and borders in width/height calculations */
}

#homepage-description .container {
    margin: 0 auto; /* Center the content horizontally */
    max-width: 1200px; /* Restrict the maximum width for better readability */
}

@media (max-width: 768px) {
    #homepage-description .container {
        padding: 0 1rem; /* Add padding for smaller screens */
    }
}

</style>

@endsection

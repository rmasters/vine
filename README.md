# Unofficial Vine API client

PHP wrapper around the unreleased Vine API.

## Usage

```php
$vine = new Vine;
$popular = $vine->popularTimeline();
foreach ($popular['data']['records'] as $vine) {
    echo sprintf('<video src="%s"></video>', $vine['videoUrl']);
}

$fromUser = $vine->userTimeline(123456789);
$tagged = $vine->tagTimeline('Webbys');
```

## Roadmap

- [x] Implement endpoints that don't require authentication (termed as 'public')
- [ ] Create models for response types,
- [ ] Implement authorised endpoints (much prefer to wait for a public API).

## Caveats

Currently, methods return raw JSON responses (as arrays). A future release will
map data into objects.

Currently, only requests that don't require authorisation are implemented.

This wrapper is based on an unreleased API used by the Vine mobile applications.
In theory it might be stable, but it should be expected that it will get out of
sync.

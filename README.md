# Dotfile API - PHP client SDK

See [dotfile documentation](https://docs.dotfile.com/reference/getting-started-1)

## Usage

First of all, you need to instanciate a `DotfileClient` which you can do directly using your API Key:

```php
use Dotfile\DotfileClient;

// Create a client directly from your API Key
$client = DotfileClient::createFromApiKey('dotkey.your_key');
```

It's also possible to create the HttpClient yourself

```php
use Dotfile\DotfileClient;
use Symfony\Component\HttpClient\HttpClient;

$httpClient = HttpClient::createForBaseUri('https://api.dotfile.com/v1/', [
    'headers' => [
        'X-DOTFILE-API-KEY' => dotkey.your_key,
        'accept' => 'application/json',
    ],
]);

$client = new DotfileClient($httpClient);
```

You can now use your client!

### Case

<details>

<summary>Create a new case</summary>

See [dotfile documentation](https://docs.dotfile.com/reference/case-create-one).

```php
use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;

$input = new CaseCreateInput();
$input->name = 'This is a new case.';

$caseCreated = $client->case->create($input); // Returns an instance of CaseCreated

echo $caseCreated->name; // Display "This is a new case."
```

</details>


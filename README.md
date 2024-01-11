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

```php
use Dotfile\Model\Case\CaseCreated;
use Dotfile\Model\Case\CaseCreateInput;

$input = new CaseCreateInput();
$input->name = 'This is a new case.';

$caseCreated = $client->case->create($input); // Returns an instance of CaseCreated

echo $caseCreated->name; // Displays "This is a new case."
```

See [dotfile documentation](https://docs.dotfile.com/reference/case-create-one).
</details>

<details>

<summary>Get a case</summary>

```php
use Dotfile\Model\Case\CaseDetailed;

$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';

$caseDetailed = $client->case->get($caseId); // Returns an instance of CaseDetailed

echo $caseDetailed->name; // Displays "This is the name of the case you retrieved."
```

See [dotfile documentation](https://docs.dotfile.com/reference/case-get-one).
</details>

<details>

<summary>Update a case</summary>

```php
use Dotfile\Model\Case\CaseUpdated;
use Dotfile\Model\Case\CaseUpdateInput;

$input = new CaseUpdateInput();
$input->name = 'This is an update for the case.';

$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';

$caseUpdated = $client->case->update($caseId, $input); // Returns an instance of CaseUpdated

echo $caseUpdated->name; // Displays "This is an update for the case."
```

See [dotfile documentation](https://docs.dotfile.com/reference/case-update-one).
</details>

<details>

<summary>Delete a case</summary>

```php
$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';

$client->case->delete($caseId);
```

See [dotfile documentation](https://docs.dotfile.com/reference/case-delete-one).
</details>

<details>

<summary>Get all cases</summary>

```php
use Dotfile\Model\Case\CaseAllInput;

$caseAllInput = new CaseAllInput();
$caseAllInput->name = 'I search the case with this name';

$caseList = $client->case->getAll($caseAllInput); // Returns an instance of CaseList

echo count($caseList->data); // Displays the number of items that matched the search
echo $caseList->data[0]->name; // Displays name of the first case if there is at least one
```
See [dotfile documentation](https://docs.dotfile.com/reference/case-get-many)
</details>

<details>

<summary>Get tags in an existing case</summary>

```php
use Dotfile\Model\Case\CaseTags;

$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';

$caseTags = $client->case->getTags($caseId); // Returns an instance of CaseTags

echo count($caseTags); // Displays 0 if there is no tag
echo $caseTags->tags[0]->label; // Displays label of the first tag if there is at least one
```
See [dotfile documentation](https://docs.dotfile.com/reference/case-tag-get-case-tags)
</details>

<details>

<summary>Add tags in an existing case</summary>

```php
use Dotfile\Model\Case\CaseTags;

$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';
$tags = ['A faire'];

$caseTags = $client->case->addTags($caseId, $tags); // Returns an instance of CaseTags

echo $caseTags->tags[0]->label; // Displays "A faire"
```
See [dotfile documentation](https://docs.dotfile.com/reference/case-tag-create-case-tags)
</details>

<details>

<summary>Remove tags in an existing case</summary>

```php
use Dotfile\Model\Case\CaseTags;

$caseId = '39cbd6d5-4da5-4d94-ae71-84895c5e552a';
$tags = ['A faire'];

$caseTags = $client->case->removeTags($caseId, $tags); // Returns an instance of CaseTags

echo count($caseTags); // Displays 0 if there was one tag
echo $caseTags->tags[0]->label; // Displays one remaining tag's label if there was more than one
```
See [dotfile documentation](https://docs.dotfile.com/reference/case-tag-delete-case-tags)
</details>

### Company

<details>

<summary>Create a new company in a case</summary>

```php
use Dotfile\Model\Company\Company;
use Dotfile\Model\Company\CompanyCreateInput;

$input = new CompanyCreateInput();
$input->caseId = 'id-of-the-case';
$input->name = 'This is a new company.';
$input->registrationNumber = '02513194000022';
$input->country = 'FR';

$company = $client->company->create($input); // Returns an instance of Company

echo $company->name; // Displays "This is a new company."
```

See [dotfile documentation](https://docs.dotfile.com/reference/company-create-one).

</details>

### Individual

<details>

<summary>Create a new individual in a case</summary>

```php
use Dotfile\Model\Individual\Individual;
use Dotfile\Model\Individual\IndividualCreateInput;

$input = new IndividualCreateInput();
$input->caseId = 'id-of-the-case';
$input->roles = [Role::Shareholder];
$input->firstName = 'Rosa';
$input->lastName = 'Parks';

$individual = $client->individual->create($input); // Returns an instance of Individual

echo $individual->firstName; // Displays "Rosa"
echo $individual->lastName; // Displays "Parks"
```

See [dotfile documentation](https://docs.dotfile.com/reference/individual-create-one).

</details>

### Tests

To launch all the tests:

```php
make test
```

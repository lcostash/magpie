## Stickee developer challenge

Wally’s Widget Company is a widget wholesaler. They sell widgets in a variety of pack sizes:

- 250 widgets
- 500 widgets
- 1,000 widgets
- 2,000 widgets
- 5,000 widgets

Their customers can order any number of widgets, but they will always be given complete packs.
The company wants to be able to fulfil all orders according to the following rules:

1) Only whole packs can be sent. Packs cannot be broken open.
1) Within the constraints of Rule 1 above, send out no more widgets than necessary to fulfil
the order.
1) Within the constraints of Rules 1 & 2 above, send out as few packs as possible to fulfil each
order.

So, for example:

Number of Widgets ordered | Correct packs to send | Incorrect solution(s)
--- | --- | ---
1 | 250 x 1 | 500 x 1 (too many widgets)
250 | 250 x 1 | 500 x 1 (too many widgets)
251 | 500 x 1 | 250 x 2 (too many packs)
501 | 500 x 1, 250 x 1 | 1,000 x 1 (too many widgets), 250 x 3 (too many packs)
12,001 | 5,000 x 2, 2,000 x 1, 250 x 1 | 5,000 x 3 (too many widgets)

## How to up the project

1) get the project on local machine
1) open command line and go to the downloaded folder on local machine

## Running the test

```bash
$ php index.php
```
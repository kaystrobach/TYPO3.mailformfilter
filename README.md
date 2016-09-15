# Functions

This extension intercepts calls to the old mailform of TYPO3 and is able to show warnings instead of the form, if non acceptable mail addresses are used.

Configuration is done via constants:

```
plugin {
    tx_mailfilter {
        # cat=Mailfilter,advanced/default/a; type=string; label=Addresses to filter
        filterAddress = @example.com
    }
}
```

This settings is also available via the constant manager.
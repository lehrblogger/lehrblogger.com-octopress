lehrblogger.com
===============

WordPress I love you but you're bringing me down.

TODO
----
Update links like http://lehrblogger.com/wp-rss2.php?cat=3>

S3 Redirection Rules
--------------------
```xml
<RoutingRules>
    <RoutingRule>
        <Condition>
            <KeyPrefixEquals>nyu/projects</KeyPrefixEquals>
        </Condition>
        <Redirect>
            <ReplaceKeyPrefixWith>projects</ReplaceKeyPrefixWith>
        </Redirect>
    </RoutingRule>
    <RoutingRule>
        <Condition>
            <KeyPrefixEquals>nyu/events</KeyPrefixEquals>
        </Condition>
        <Redirect>
            <ReplaceKeyPrefixWith>projects</ReplaceKeyPrefixWith>
        </Redirect>
    </RoutingRule>
    <RoutingRule>
        <Condition>
            <KeyPrefixEquals>nyu/classes</KeyPrefixEquals>
        </Condition>
        <Redirect>
            <ReplaceKeyPrefixWith>projects</ReplaceKeyPrefixWith>
        </Redirect>
    </RoutingRule>
</RoutingRules>
```

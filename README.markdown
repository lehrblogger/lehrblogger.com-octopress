[lehrblogger.com](http://lehrblogger.com)
===============

WordPress I love you, [but you're bringing me down.](http://www.youtube.com/watch?v=-eohHwsplvY)

A static Jekyll site based off of the [Octopress framework](http://octopress.org/) and [Ryan Duessing's Minimalist theme.](https://github.com/ryandeussing/octopress-minimalist) and hosted on [Amazon S3](http://aws.amazon.com/s3/).

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
    <RoutingRule>
        <Condition>
            <KeyPrefixEquals>category/itp/</KeyPrefixEquals>
        </Condition>
        <Redirect>
            <ReplaceKeyPrefixWith>category/itp-</ReplaceKeyPrefixWith>
        </Redirect>
    </RoutingRule>
</RoutingRules>
```

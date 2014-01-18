#!/usr/bin/env python
# -*- coding: utf-8 -*-\

rule_format = """\t<RoutingRule>
\t\t<Condition>
\t\t\t<KeyPrefixEquals>%s</KeyPrefixEquals>
\t\t</Condition>
\t\t<Redirect>
\t\t\t<HostName>lehrblogger.com</HostName>
\t\t\t<ReplaceKeyPrefixWith>%s</ReplaceKeyPrefixWith>
\t\t</Redirect>
\t</RoutingRule>"""

rules = [
    ['nyu/projects', 'projects'],
    ['nyu/events'  , 'projects'],
    ['nyu/classes' , 'projects'],
    ['category/ITP/4-in-4'           , 'category/itp-4-in-4'],
    ['category/ITP/A2Z'              , 'category/itp-a2z'],
    ['category/ITP/AJAX'             , 'category/itp-ajax'],
    ['category/ITP/Design-For-UNICEF', 'category/itp-design-for-unicef'],
    ['category/ITP/Election'         , 'category/itp-election'],
    ['category/ITP/ICM'              , 'category/itp-icm'],
    ['category/ITP/Little-Computers' , 'category/itp-little-computers'],
    ['category/ITP/PComp'            , 'category/itp-pcomp'],
    ['category/ITP/SocObj'           , 'category/itp-socobj'],
    ['category/ITP/Time'             , 'category/itp-time'],
    ['category/ITP/thesis'           , 'category/itp-thesis'],
    ['category/ITP/'                 , 'category/itp/'],  # this one needs an explicit slash, otherwise it matches the correct categories
    ['2010/01/27/einstein%e2%80%99s-theory-of-general-relativity-a-personal-description', '2010/01/27/einsteins-theory-of-general-relativity-a-personal-description'],
    ['Lehrburger_Resume_web.pdf'     , 'lehrburger_resume.pdf'],
    ['Lehrburger_Portfolio_web.pdf'  , 'lehrburger_portfolio.pdf']
]

if __name__ == '__main__':
    print '<RoutingRules>'
    for key_prefix_equals, replace_key_prefix_with in rules:
        print rule_format % (key_prefix_equals, replace_key_prefix_with)
        # Only lowercase if we need to, and don't lowercase if the point of the rule was to lowercase
        if key_prefix_equals != key_prefix_equals.lower() and key_prefix_equals.lower() != replace_key_prefix_with:
            print rule_format % (key_prefix_equals.lower(), replace_key_prefix_with)
    print '</RoutingRules>'

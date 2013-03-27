<?php
$xml = <<<XML
<outcomeProcessing>
    <outcomeCondition>
        <outcomeIf>
            <or>
                <isNull>
                    <outcomeMaximum outcomeIdentifier="SCORE" weightIdentifier="WEIGHT"/>
                </isNull>
                <equal toleranceMode="exact">
                    <sum>
                        <outcomeMaximum outcomeIdentifier="SCORE" weightIdentifier="WEIGHT"/>
                    </sum>
                    <baseValue baseType="float">0.0</baseValue>
                </equal>
            </or>
            <setOutcomeValue identifier="SCORE">
                <baseValue baseType="float">1.0</baseValue>
            </setOutcomeValue>
        </outcomeIf>
        <outcomeElse>
            <setOutcomeValue identifier="SCORE">
                <divide>
                    <sum>
                        <testVariables variableIdentifier="SCORE" weightIdentifier="WEIGHT"/>
                    </sum>
                    <sum>
                        <outcomeMaximum outcomeIdentifier="SCORE" weightIdentifier="WEIGHT"/>
                    </sum>
                </divide>
            </setOutcomeValue>
        </outcomeElse>
    </outcomeCondition>
</outcomeProcessing>
XML;

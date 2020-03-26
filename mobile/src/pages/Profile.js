import React from 'react'
import { StyleSheet, Text, View } from 'react-native'
import { WebView } from 'react-native-webview';

function Profile({route}){
    const {github_username} = route.params;

    return (
        <WebView style={{flex: 1}} source={{uri: `http://github.com/${github_username}`}}/>
    )
}

export default Profile

const styles = StyleSheet.create({})

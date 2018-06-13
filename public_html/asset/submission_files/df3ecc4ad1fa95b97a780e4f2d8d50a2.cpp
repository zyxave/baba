#include <iostream>
#include <stdio.h>
#include <string>
#include <string.h>
#include <math.h>

using namespace std;
 
int freq[100001];
 
int main() {
    int t;
    scanf("%d", &t);
    while (t--) {
        string s;
        cin >> s;
        int a[26];
        memset(a, 0, sizeof(a));
        for (int i = 0; i < s.length(); i++) {
            a[s[i]-97]++;
        }
       
        bool tm = true;
        memset(freq, 0, sizeof(freq));
        for (int i = 0; i < 26; i++) {
            if (a[i] != 0) freq[a[i]]++;
        }
        
    
        int jml = 0;
        for (int i = 0; i < 100000; i++) {
            if (freq[i] > 0) jml++;
            if (jml > 2) {
                break;
            }
        }
        if (jml != 2) tm = false;
        int val1, val2;
        for (int i = 0; i < 100000; i++) {
            if (freq[i] > 0) {
                val1 =  i;
                break;
            }
        }
        for (int i = val1+1; i < 100000; i++) {
            if (freq[i] > 0) val2 = i;
        }
        bool out = false;
        if (val1 != 1 && val2 != 1) {
            if (abs(val1-val2) == 1) out = true;
        } else {
            if ((val1 == 1 && freq[val1] == 1) || (val2 == 1 && freq[val2] == 1)) out = true;
        }
       
        if (out && tm) {
            printf("YES\n");
        } else {
            printf("NO\n");
        }
    }
    return 0;
}	

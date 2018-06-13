#include<bits/stdc++.h>
using namespace std;
int i,j,k,n,A[26];
bool b;
string s;
int main()
{
    cin>>n;
    for(i=1;i<=n;i++)
    {
        cin>>s;
        b=1;
        for(j=0;j<26;j++) A[j]=0;
        for(j=0;j<s.length();j++) A[int(s[j])-97]++;
        sort(A,A+26);
        for(j=0;j<26;j++) if(A[j]!=0) break;
        k=j;
        if(A[k]==1 && A[k+1]!=1) A[k]--;
        else if(A[25]==(A[24]+1)) A[25]--;
        for(j=k;j<26;j++)
            if(A[j]!=0 && A[j]!=A[25])
            {
                    b=0;
                    break;
            }
        if(b) cout<<"YES"<<endl;
        else cout<<"NO"<<endl;
    }
}

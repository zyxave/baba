#include<bits/stdc++.h>
using namespace std;
int main()
{
    int a,n,b;int c;int total;
    cin>>n;
    for(int i=0;i<n;i++)
    {   total=0;
        cin>>a>>b;
        c=a-b;
        total=total+c/100;
        c=c%100;
        total=total+c/20;
        c=c%20;
        total=total+c/5;
        c=c%5;
        total=total+c;
        cout<<total<<endl;
    }
}

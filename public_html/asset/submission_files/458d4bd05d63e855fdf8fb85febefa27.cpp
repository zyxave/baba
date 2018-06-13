#include<bits/stdc++.h>
using namespace std;
int main()
{long long  t,n,x;int total;
    cin>>t;
    for(int i=0;i<t;i++)
    {  total=0;
        cin>>n;
        for(long long j=1;j<=n;j++)
        {
            if(sqrt(j)==trunc(sqrt(j))) total++;
        }
        cout<<total<<endl;
    }
}

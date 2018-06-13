#include<bits/stdc++.h>
using namespace std;
int main()
{
    int t,n,x;int total;
    cin>>t;
    for(int i=0;i<t;i++)
    {   total=0;
        cin>>n;
        for(int k=1;k<=n;k++)
        {x=0;
            for(int j=1;j<=n;j++)
            {
                if(k%j==0){x++;}
            }
        if(x%2==1){total++;}
        }
        cout<<total<<endl;
    }
}

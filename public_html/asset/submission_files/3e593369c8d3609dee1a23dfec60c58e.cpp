#include<bits/stdc++.h>
using namespace std;
int main()
{
    int a,b,x;
    x=0;
    cin>>a;
    for (int i=0;i<a;i++)
    {
        cin>>b;
        int arr[b];
        for (int j=0;j<b;j++)
        {
            arr[j]=0;
        }
        for (int j=1;j<=b;j++)
        {
            for (int k=1;k<=b;k++)
            {
                if (k%j==0)
                {
                    if (arr[k-1]==0) {arr[k-1]=1;}
                    else if(arr[k-1]==1) {arr[k-1]=0;}
                }
            }
        }
        for (int j=0;j<b;j++)
        {
            if (arr[j]==1) {x++;}
        }
        cout<<x<<endl;
        x=0;
    }
}

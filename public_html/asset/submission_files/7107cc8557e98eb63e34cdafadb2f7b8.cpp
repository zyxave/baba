#include<bits/stdc++.h>
using namespace std;
int main()
{
	int t;
	scanf("%d",&t);
	for(int l=1;l<=t;l++)
	{
		int n,d,r,ans;
		scanf("%d %d %d",&n,&d,&r);
		int arrx[n+3];
		int arry[n+3];
		for(int a=0;a<n;a++)
			scanf("%d",&arrx[a]);
		for(int a=0;a<n;a++)
			scanf("%d",&arry[a]);
		int arr[n+3];
		sort(arrx, arrx + n);
		sort(arry, arry + n);
		ans=0;
		
		for(int a=0;a<n;a++)
			arr[a]=arrx[a]+arry[a];
		for(int a=0;a<n;a++)
		{
			if(arr[a]>d)
				ans=ans+(arr[a]-d);
			else
			 	ans=ans;
		}
		ans=ans*r;
		printf("%d\n",ans);
	}
}

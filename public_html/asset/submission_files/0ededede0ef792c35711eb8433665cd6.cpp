#include<bits/stdc++.h>
using namespace std;
int t,res,ans,leng,a,b,c,anss,xx=0,yy=0,z,arr[100005],ansss,arrr[100005];
bool ses,boo,bo;
char s[100004];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%s",&s);anss=1;bo=false;res,ans,z=0,ansss=0;
		leng=strlen(s)	;
		if(leng>1)
		{
			res=2;
		}
		else if(leng==1) res=1;
		for(a=2;a<leng;a++)
		{
			printf("%d\n",res);
			ses=false;
			if(bo)
			{
				boo=false;
				for(b=a+1;b<z+a+1;b++)
				{
					//printf("%c %c %d %d\n",s[b],arrr[b-a-1],b,b-a-1);
					if(s[b]==arrr[b-a-1]) ;
					else 
					{
						boo=true;
						break;
					}
				}
				if(boo==false)
				{
					ses=true;
					 ansss=anss;
				}
			}
			anss=1;
			for(b=0;b<a;b++)
			{
				if(s[a]==s[b])
				{
					ans=1;z=1;arr[0]=s[a];
					for(c=b+1;c<a;c++)
					{
					//	printf("%d %d %d %d\n",a,b,c,res);
					//	printf("%c %c\n",s[c],s[a+c-b]);
						if(s[c]!=s[a+c-b])
						{
							break;
						}
						arr[z++]=s[c];
						ans++;
					}
					anss=max(anss,ans);
				}
			}
			if(ansss<anss && anss>2)
			{ res+=2,a+=anss-1,bo=true;
				for(int i=0;i<z;i++)
				{
					arrr[i]=arr[i];
				}
			}
			else res++;
		}
		printf("%d\n",res);
	}
}
